<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{

    public function index()
    {
        return view("advertisements.list", [
            "advertisements" => Advertisement::latest()->get()
        ]);
    }


    public function create()
    {
        return view("advertisements.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "price" => ["required"],
            "file" => ["required", "mimes:jpg,png"],
            "description" => ["max:255"]
        ]);

        $filePath = $request->file("file")->store("/advertisements/images");

        Advertisement::create([
            "title" => $request->title,
            "price" => $request->price,
            "path" => $filePath,
            "description" => $request->description,
            "publish" => $request->publish ? 1 : 0,
            "mobile" => $request->mobile ? 1 : 0,
            "tablet" => $request->tablet ? 1 : 0,
            "desktop" => $request->desktop ? 1 : 0,
        ]);

        LogActivity::add("New Advertisement " . $request->title . " has been Created");
        Session::flash('success', 'New Advertisement has been Created');

        return redirect()->route("advertisements.index");
    }


    public function show(Advertisement $advertisement)
    {
        //
    }


    public function edit(Advertisement $advertisement)
    {
        return view("advertisements.edit", [
            "advertisement" => $advertisement
        ]);
    }


    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            "title" => ["required"],
            "price" => ["required"],
            "description" => ["max:255"]
        ]);

        $filePath = $advertisement->path;

        if ($request->file("file")) {
            Storage::delete($advertisement->path);
            $filePath = $request->file("file")->store("/advertisements/images");
        }

        $advertisement->update([
            "title" => $request->title,
            "price" => $request->price,
            "path" => $filePath,
            "description" => $request->description,
            "publish" => $request->publish ? 1 : 0,
            "mobile" => $request->mobile ? 1 : 0,
            "tablet" => $request->tablet ? 1 : 0,
            "desktop" => $request->desktop ? 1 : 0,
        ]);

        Session::flash('success', 'Advertisement has been Updated');

        return back();
    }

    public function destroy(Advertisement $advertisement)
    {
        //
    }
}
