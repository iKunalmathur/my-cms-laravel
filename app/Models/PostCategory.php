<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "post_categories";

    protected $fillable = [
        "title",
        "color",
        "slug"
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, "posts_categories", "category_id", "post_id");
    }
}
