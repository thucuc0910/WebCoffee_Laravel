<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'price_sale',
        // 'thumb',
        'qty',
        
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id')
            ->withDefault(['name' => '']);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')
            ->withDefault(['name' => '']);
    }

}
