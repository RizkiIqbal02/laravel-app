<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category','author'];

    public function category() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu category"
    {
        return $this->belongsTo(Category::class);
    }

    public function author() //dibaca nya gini "satu post hanya bisa dimiliki oleh satu user"
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
