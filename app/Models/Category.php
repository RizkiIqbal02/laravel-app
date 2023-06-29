<?php

namespace App\Models;

// use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function products()
    {
        return $this->hasMany(Product::class); // dapat diartikan satu kategori dapat dimiliki oleh banyak product
    }
    // public function posts()
    // {
    //     return $this->hasMany(Product::class); // dapat diartikan satu kategori dapat dimiliki oleh banyak product
    // }
    //Route model binding
    public function getRouteKeyName() {
        return 'slug';
    }
}
