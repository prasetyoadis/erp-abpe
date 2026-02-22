<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasUlids;

    /**
     * The attributes that are mass protecable.
     *
     * @var list<string>, String
     */
    protected $guarded = ['id'];
    protected $keyType = 'string';

    /**
     * The attributes that are mass public.
     *
     * @var bool
     */
    public $incrementing = false;


    public function salesOrders()
    {
        return $this->belongsToMany(
            SalesOrder::class,
            'sales_order_items',
            'product_id',
            'sales_order_id'
        )->withPivot([
            'quantity',
            'unit_price',
            'total_price',
        ])->withTimestamps();
    }
}
