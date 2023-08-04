<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'payment_method',
        'payment_status',
        'status',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
