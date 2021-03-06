<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //use HasFactory;

    use SoftDeletes;

    protected $fillable = ['title' , 'url_clean' , 'content', 'posted'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories', 'post_id', 'category_id');
    }

    public function image()
    {
        return $this->hasOne(PostImage::class);
    }
}
