<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{

    public function index()
    {
        return view("post_categories.list", [
            "post_categories" => PostCategory::all()
        ]);
    }

    public function create()
    {
        return view("post_categories.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"]
        ]);

        PostCategory::create([
            "title" => $request->title,
            "color" => $request->color ?? "gray",
            "slug" => Str::slug($request->title)
        ]);

        Session::flash('message', 'New post category has been created');
        return redirect()->route("post_categories.index");
    }

    public function show(PostCategory $postCategory)
    {
        //
    }

    public function edit(PostCategory $postCategory)
    {
        return view("post_categories.edit", [
            "postCategory" => $postCategory
        ]);
    }

    public function update(Request $request, PostCategory $postCategory)
    {
        $request->validate([
            "title" => ["required"]
        ]);

        $postCategory->update([
            "title" => $request->title,
            "color" => $request->color ?? "gray",
            "slug" => Str::slug($request->title)
        ]);

        Session::flash('message', 'Post category has been Updated');
        return redirect()->route("post_categories.index");
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        Session::flash('message', 'Post category has been Deleted');
        return redirect()->route("post_categories.index");
    }
}
