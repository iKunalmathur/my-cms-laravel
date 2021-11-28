<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class PostController extends Controller
{

    public function index()
    {

        return view("posts.list", [
            "posts" => Post::latest()->get()
        ]);
    }

    public function create()
    {
        return view("posts.create", [
            "categories" => PostCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "excerpt" => ["required"],
            "categories" => ["required", "exists:post_categories,id"],
            "content" => ["required"],
        ]);

        $post = Post::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "excerpt" => $request->excerpt,
            "publish" => $request->publish ? 1 : 0,
            "body" => $request->content,
            "image" => $request->image,
        ]);

        $post->categories()->sync($request->categories);

        LogActivity::add("New Post " . $request->title . " has been Created");
        Session::flash('success', 'New Post has been Created');

        return redirect()->route("posts.index");
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        return view("posts.edit", [
            "post" => $post,
            "categories" => PostCategory::all()
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => ["required"],
            "excerpt" => ["required"],
            "categories" => ["required", "exists:post_categories,id"],
            "content" => ["required"],
        ]);

        $post->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "excerpt" => $request->excerpt,
            "publish" => $request->publish ? 1 : 0,
            "body" => $request->content,
            "image" => $request->image,
        ]);

        $post->categories()->sync($request->categories);

        Session::flash('success', 'Post has been Updated');
        return redirect()->route("posts.index");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success', 'Post has been Deleted');
        return redirect()->route("posts.index");
    }
}
