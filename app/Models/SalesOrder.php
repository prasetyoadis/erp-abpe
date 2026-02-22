<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use App\Enums\SalesOrderStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;


class SalesOrder extends Model
{
    //
    use HasUlids;
    
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = ['id'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => SalesOrderStatus::class,
            'payment_status' => PaymentStatus::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    /**
     * Next level: many-to-many via pivot
     */
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'sales_order_items',
            'sales_order_id',
            'product_id'
        )->withPivot([
            'quantity',
            'unit_price',
            'total_price',
        ])->withTimestamps();
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['search'] ?? null, function ($q, $search) {
                $q->where(function ($qq) use ($search) {
                    $qq->where('order_num', 'like', "%{$search}%")
                    ->orWhereHas('customer', function ($q2) use ($search) {
                            $q2->where('name', 'like', "%{$search}%");
                    });
                });
            })

            ->when($filters['customer'] ?? null, function ($q, $customerId) {
                $q->where('customer_id', $customerId);
            })

            ->when($filters['status'] ?? null, function ($q, $status) {
                $q->where('status', $status);
            })

            ->when(($filters['from'] ?? null) || ($filters['to'] ?? null), function ($q) use ($filters) {
                $from = $filters['from'] ?? null;
                $to   = $filters['to'] ?? null;

                if ($from && $to) {
                    // kalau dua-duanya ada
                    $q->whereBetween('created_at', [
                        $from . ' 00:00:00',
                        $to . ' 23:59:59',
                    ]);
                } elseif ($from) {
                    // cuma from
                    $q->where('created_at', '>=', $from . ' 00:00:00');
                } elseif ($to) {
                    // cuma to
                    $q->where('created_at', '<=', $to . ' 23:59:59');
                }
            })

            ->when($filters['sort_by'] ?? null, function ($q, $sortBy) use ($filters) {
                $allowed = ['order_num', 'total_amount', 'created_at'];

                if (!in_array($sortBy, $allowed)) {
                    return;
                }

                $order = strtolower($filters['order'] ?? 'asc');
                $order = in_array($order, ['asc', 'desc']) ? $order : 'asc';

                $q->orderBy($sortBy, $order);
            });
    }
}
