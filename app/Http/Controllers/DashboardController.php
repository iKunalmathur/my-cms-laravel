<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {

        $data["posts"] = Post::count();
        $data["post_categories"] = PostCategory::count();
        $data["media"] = Media::count();

        // dd($data);

        return view("dashboard", $data);
    }
}
