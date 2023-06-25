<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category','author'];

    public function scopeSearching($query, array $saringan) {
        // if (isset($saringan['search']) ? $saringan['search'] : false)  {
        //     return $query->where('title', 'like', '%'.$saringan['search'].'%')->orWhere('body', 'like', '%'.$saringan['search'].'%');
        // }
        $query->when($saringan['search'] ?? false, function($query, $cari){
            return $query->where('title', 'like', '%'.$cari.'%')->orWhere('body', 'like', '%'.$cari.'%')->orWhere('excerpt', 'like', '%'.$cari.'%');
        });

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
    public function category() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu category"
    {
        return $this->belongsTo(Category::class);
    }

    public function author() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu user"
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Route model binding
    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
