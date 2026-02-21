<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    //
    use HasUlids;

     protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = ['id'];

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }

    // Shortcut langsung ke customer (optional advanced relation)
    public function customer()
    {
        return $this->hasOneThrough(
            Customer::class,
            SalesOrder::class,
            'id',            // FK di sales_orders
            'id',            // PK di customers
            'sales_order_id',// FK di shipments
            'customer_id'    // FK di sales_orders
        );
    }
}
