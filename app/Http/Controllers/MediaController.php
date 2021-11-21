<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
            "description" => $request->description
        ]);

        LogActivity::add("New Media " . $request->title . " has been Created");
        Session::flash('success', 'New Media has been Created');

        return redirect()->route("media.index");
    }

    public function show(Media $medium)
    {
        //
    }

    public function edit(Media $medium)
    {
        return view("media.edit", [
            "medium" => $medium
        ]);
    }

    public function update(Request $request, Media $medium)
    {
        // dd($request->all());
        $request->validate([
            "title" => ["required"],
            "description" => ["max:255"]
        ]);

        if ($request->file("file")) {

            Storage::delete($medium->path);
            $filePath = $request->file("file")->store("/media/images");

            $medium->update([
                "title" => $request->title,
                "path" => $filePath,
                "description" => $request->description
            ]);
        } else {
            $medium->update([
                "title" => $request->title,
                "description" => $request->description
            ]);
        }


        Session::flash('success', 'Media has been Updated');
        return redirect()->route("media.index");
    }

    public function destroy(Media $medium)
    {
        //
    }
}
