<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category'];

    public function scopeSearching($query, array $saringan) {
        if (isset($saringan['search']) ? $saringan['search'] : false)  {
            return $query->where('name', 'like', '%'.$saringan['search'].'%')
            ->orWhere('slug', 'like', '%'.$saringan['search'].'%')
            ->orWhere('price', 'like', '%'.$saringan['search'].'%')
            ->orWhere('stock', 'like', '%'.$saringan['search'].'%');
        }
        // $query->when($saringan['search'] ?? false, function($query, $cari){
        //     return $query->where('title', 'like', '%'.$cari.'%')->orWhere('body', 'like', '%'.$cari.'%')->orWhere('excerpt', 'like', '%'.$cari.'%');
        // });

        $query->when($saringan['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($saringan['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });

    }

    public function category() //dibaca nya gini "satu product hanya bisa dimiliki oleh satu category"
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}

