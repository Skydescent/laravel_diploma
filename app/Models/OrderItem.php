<?php

namespace App\Models;

use App\Traits\FlushTagCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes, FlushTagCache;

    public static $tagsArr = ['cart', 'orderItems'];

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function product()
    {
        return $this->price->product();
    }

    public function getSumAttribute()
    {
        return $this->quantity * $this->price->price;
    }

}
