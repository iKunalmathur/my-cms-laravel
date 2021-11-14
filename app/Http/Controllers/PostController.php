<?php

namespace App\Http\Controllers;

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
            "posts" => Post::all()
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
            "categories" => ["required", "exists:post_categoriess,id"],
            "content" => ["required"],
        ]);

        Post::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "excerpt" => $request->excerpt,
            "publish" => $request->publish ? 1 : 0,
            "body" => $request->content,
        ]);

        Session::flash('message', 'New Post has been Created');
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
        ]);

        $post->categories()->sync($request->categories);

        Session::flash('message', 'Post has been Updated');
        return redirect()->route("posts.index");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('message', 'Post has been Deleted');
        return redirect()->route("posts.index");
    }
}
