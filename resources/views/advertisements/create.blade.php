@extends('layouts.app')
@section('page-title', "Advertisements Create" )
@section('page-cta-link', route("advertisements.index"))
@section('page-cta', "GO Back")

@section('page-content')
<form action="{{ route("advertisements.store") }}" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 space-y-2">
        <!-- Title input -->
        <x-input type="text" id="title" name="title" label="Title" theme="gray"
            note=""  />
        <!-- price input -->
        <x-input type="number" id="price" name="price" label="price" theme="gray" placeholder="1000"
            note=""  />
        <!-- file input -->
        <x-input type="file" id="file" name="file" label="File" theme="gray"
            note=""  />
        <!-- Excerpt input -->

        <x-textarea id="description" name="description" label="Description" rows="5" />
        <div class="flex gap-6">
            <!-- Publish Or not input -->
            <div class="flex text-sm py-2">
                <x-checkbox label="Make it" uLabel="public" id="publish" name="publish" />
            </div>
            <!-- mobile -->
            <div class="flex text-sm py-2">
                <x-checkbox label="On" uLabel="mobile" id="mobile" name="mobile" />
            </div>
            <!-- tablet -->
            <div class="flex text-sm py-2">
                <x-checkbox label="On" uLabel="tablet" id="tablet" name="tablet" />
            </div>
            <!-- desktop -->
            <div class="flex text-sm py-2">
                <x-checkbox label="On" uLabel="desktop" id="desktop" name="desktop" />
            </div>
        </div>

        <div>
            <ul>
                <li class="text-xs text-gray-700 dark:text-gray-400 capitalize">
                    <div class="flex items-center my-4">
                        <svg class="h-5 w-5 mr-1 viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <span>
                            Specific image size may required for better visuals
                        </span>
                    </div>
                </li>
            </ul>
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