@extends('layouts.app')
@section('page-title', "Advertisements Create" )
@section('page-cta-link', route("advertisements.index"))
@section('page-cta', "GO Back")

@section('page-content')
<form action="{{ route("advertisements.update", $advertisement) }}" method="POST" enctype="multipart/form-data">
	@csrf
    @method("PUT")
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 space-y-2">
        <p class="text-white">Preview</p>
        <div class="border rounded">
            <img src="{{ $advertisement->imgPath() }}" alt="image" class="border rounded">
        </div>
        <!-- Title input -->
        <x-input type="text" id="title" name="title" label="Title" theme="gray"
            note=""  value="{{ $advertisement->title }}" />
             <!-- price input -->
        <x-input type="number" id="price" name="price" label="price" theme="gray" placeholder="1000"
            note="" value="{{ $advertisement->price }}" />
        <!-- file input -->
        <x-input type="file" id="file" name="file" label="File" theme="gray"
            note=""  />
        <!-- Excerpt input -->

        <x-textarea id="description" name="description" label="Description" rows="5" value="{{ $advertisement->description }}" />
        <div class="flex gap-6">
            <!-- Publish Or not input -->
            <div class="flex text-sm py-2">
               <x-checkbox label="On" uLabel="publish" id="publish" name="publish" checked="{{ $advertisement->publish }}" />
           </div>
            <!-- mobile -->
             <div class="flex text-sm py-2">
                <x-checkbox label="On" uLabel="mobile" id="mobile" name="mobile" checked="{{ $advertisement->mobile }}" />
            </div>
            <!-- tablet -->
            <div class="flex text-sm py-2">
               <x-checkbox label="On" uLabel="tablet" id="tablet" name="tablet" checked="{{ $advertisement->tablet }}" />
           </div>
           <!-- desktop -->
           <div class="flex text-sm py-2">
              <x-checkbox label="On" uLabel="desktop" id="desktop" name="desktop" checked="{{ $advertisement->desktop }}" />
          </div>
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