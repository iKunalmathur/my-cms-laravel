@extends('layouts.app')
@section('page-title', "New Categories" )
@section('page-cta-link', route("categories.create"))
@section('page-cta', "New Category")

@section('page-content')
<form action="{{ route("categories.store") }}" method="POST">
	@csrf
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 space-y-2">
        <!-- Title input -->
        <x-input type="text" id="title" name="title" label="Title" theme="gray"
            note="slug will be auto genrated using title" />
        <!-- Publish Or not input -->
        <div class="flex text-sm py-2">
            <x-checkbox label="Make it" uLabel="public" id="publish" name="publish" />
        </div>

        <div>
            <button
				type="submit"
                class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create
            </button>
        </div>
    </div>
</form>
@endsection