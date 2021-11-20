<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "color",
        "slug"
    ];

    public function posts()
    {
        return $this->belongsToMany(PostCategory::class, "post_catagory", "category_id", "post_id");
    }
}
