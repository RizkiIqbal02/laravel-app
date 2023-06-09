<?php

namespace App\Models;

// use App\Models\Category;
use App\Models\Comment;
use App\Models\PostsImage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author', 'comments','images'];
    // protected $with = ['category','author'];

    public function scopeSearching($query, array $saringan) {
        if (isset($saringan['search']) ? $saringan['search'] : false)  {
            return $query->where('title', 'like', '%'.$saringan['search'].'%')
            ->orWhere('body', 'like', '%'.$saringan['search'].'%');
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
    // public function category() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu category"
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function author() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu user"
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu user"
    {
        return $this->hasMany(Comment::class);
    }
    public function images() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu user"
    {
        return $this->hasMany(PostsImage::class);
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
