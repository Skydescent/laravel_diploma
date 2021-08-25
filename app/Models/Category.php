<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;

    public $guarded = [];

    protected static function booted()
    {
        static::updated(function () {
            Cache::forget('categories');
        });
        static::created(function () {
            Cache::forget('categories');
        });

        static::saved(function () {
            Cache::forget('categories');
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
