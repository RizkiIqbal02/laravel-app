<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function posts() //dibaca nya gini "satu product hanya bisa dimiliki oleh satu category"
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function user() //dibaca nya gini "satu product hanya bisa dimiliki oleh satu category"
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
