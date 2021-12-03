<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "posts";

    protected $fillable = [
        "title",
        "slug",
        "excerpt",
        "publish",
        "body",
        "image"
    ];

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class, "posts_categories", "post_id", "category_id");
    }
}
