<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'total',
        'full_name',
        'phone',
        'address',
        'email',
        'content',
        'active'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'order_id')
            ->withDefault(['name' => '']);
    }

    public function orders_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id')
            ->withDefault(['name' => '']);
    }

}
