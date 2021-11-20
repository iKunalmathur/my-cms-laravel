@extends('layouts.app')
@section('page-title', "Edit Categories" )
@section('page-cta-link', route("post_categories.index"))
@section('page-cta', "GO Back")

@section('page-content')
<form action="{{ route("post_categories.update", $postCategory) }}" method="POST">
	@csrf
    @method("PUT")
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 space-y-2">
        <!-- Title input -->
        <x-input type="text" id="title" name="title" label="Title" theme="gray" value="{{ $postCategory->title }}"
            note="slug will be auto genrated using title" />
         <!-- color input -->
        <x-input type="text" id="color" name="color" label="color" theme="gray"
            note="default gray" placeholder="blue / #333" value="{{ $postCategory->color }}" />
        <!-- Publish Or not input -->
        <div class="flex text-sm py-2">
            <x-checkbox label="Make it" uLabel="public" id="publish" name="publish" />
        </div>

        <div>
            <button
				type="submit"
                class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save
            </button>
        </div>
    </div>
</form>
@endsection