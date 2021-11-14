@extends('layouts.app')
@section('page-title', "Media Create" )
@section('page-cta-link', route("media.create"))
@section('page-cta', "New Media")

@section('page-content')
<form action="{{ route("media.store") }}" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 space-y-2">
        <!-- Title input -->
        <x-input type="text" id="title" name="title" label="Title" theme="gray"
            note=""  />
        <!-- Title input -->
        <x-input type="file" id="file" name="file" label="File" theme="gray"
            note=""  />
        <!-- Excerpt input -->

        <x-textarea id="description" name="description" label="Description" rows="5" />
        <!-- Publish Or not input -->
        <div class="flex text-sm py-2">
            <x-checkbox label="Make it" uLabel="public" id="publish" name="publish" />
        </div>

        <div>
            <button
                class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create
            </button>
        </div>
    </div>
</form>
@endsection