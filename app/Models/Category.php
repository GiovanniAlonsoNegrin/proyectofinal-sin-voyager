<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //use HasFactory;

    use SoftDeletes;

    protected $fillable = ['title' , 'url_clean'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_categories', 'category_id', 'post_id');
    }
}
