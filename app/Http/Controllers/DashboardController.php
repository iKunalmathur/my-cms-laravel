<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\Media;
use App\Models\Post;
use App\Models\PostCategory;

use function App\Helpers\showActivityLog;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $data["posts"] = Post::count();
        $data["post_categories"] = PostCategory::count();
        $data["media"] = Media::count();
        $data["logs"] = LogActivity::show();

        // dd($data);

        return view("dashboard", $data);
    }
}
