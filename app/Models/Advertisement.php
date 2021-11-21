<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "price",
        "path",
        "description",
        "publish",
        "mobile",
        "tablet",
        "desktop",
        "clicks",
    ];

    public function imgPath()
    {
        return asset("storage/" . $this->path);
    }
}
