<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MediaController extends Controller
{

    public function index()
    {
        return view("media.list", [
            "media" => Media::all()
        ]);
    }

    public function create()
    {
        return view("media.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "file" => ["required", "mimes:jpg,png"],
            "description" => ["max:255"]
        ]);

        $filePath = $request->file("file")->store("/media/images");

        // dd($filePath);

        Media::create([
            "title" => $request->title,
            "path" => $filePath,
            "description" => $request->filePath
        ]);

        Session::flash('message', 'New Media has been Created');
        return redirect()->route("media.index");
    }

    public function show(Media $media)
    {
        //
    }

    public function edit(Media $media)
    {
        //
    }


    public function update(Request $request, Media $media)
    {

        dd($media);
        $request->validate([
            "title" => ["required"],
            "file" => ["required", "mimes:jpg,png"],
            "description" => ["max:255"]
        ]);

        $filePath = $request->file("file")->store("/media/images");

        // dd($filePath);

        $media->update([
            "title" => $request->title,
            "path" => $filePath,
            "description" => $request->filePath
        ]);

        Session::flash('message', 'New Media has been Created');
        return redirect()->route("media.index");
    }

    public function destroy(Media $media)
    {
        //
    }
}
