@extends('layouts.app')
@section('page-title', "Media Edit" )
@section('page-cta-link', route("media.index"))
@section('page-cta', "GO Back")

@section('page-content')
<form action="{{ route("media.update", $medium) }}" method="POST" enctype="multipart/form-data">
	@csrf
    @method("PUT")
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 space-y-2">
        <p class="text-white">Preview</p>
        <div class="border rounded">
            <img src="{{ $medium->imgPath() }}" alt="image" class="border rounded">
        </div>
        <!-- Title input -->
        <x-input type="text" id="title" name="title" label="Title" theme="gray"
            note=""  value="{{ $medium->title }}" />
        <!-- file input -->
        <x-input type="file" id="file" name="file" label="File" theme="gray"
            note=""  />
        <!-- Excerpt input -->

        <x-textarea id="description" name="description" label="Description" rows="5" value="{{ $medium->description }}" />
        <!-- Publish Or not input -->
        <div class="flex text-sm py-2">
            <x-checkbox label="Make it" uLabel="public" id="publish" name="publish" />
        </div>

        <div>
            <button
                class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save
            </button>
        </div>
    </div>
</form>
@endsection