@extends('layouts.app')
@section('page-title', "Post Edit" )
@section('page-cta-link', route("posts.index"))
@section('page-cta', "GO Back")

@section('add-to-head')
<style>
    .ck.ck-editor__main>.ck-editor__editable {
        background-color: #24262d !important;
        color: aliceblue
    }
</style>
@endsection

@section('page-content')
<form action="{{ route("posts.update", $post) }}" method="POST">
	@csrf
    @method("PUT")
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 space-y-2">
        <!-- Title input -->
        <x-input type="text" id="title" name="title" label="Title" value="{{ $post->title }}"
            note="slug will be auto genrated using title" />
        <!-- Excerpt input -->
        <x-textarea id="excerpt" name="excerpt" label="Excerpt" rows="5" value="{{ $post->excerpt }}" />
		<!-- Cover Image input -->
		<x-input type="url" id="image" name="image" label="Cover" theme="gray"
			note="image url" placeholder="http:://example.com/image.png" value="{{ $post->image }}" />
        <!-- Category input -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Category
            </span>
            <select name="categories[]" multiple
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option disabled>Select A Category</option>
				@foreach ($categories as $category)
					<option value="{{ $category->id }}"
						@foreach ($post->categories as $c)
							@if ($c->id === $category->id)
							selected
							@endif
						@endforeach
						>{{ $category->title }}</option>
				@endforeach
            </select>
        </label>
        <!-- Publish Or not input -->
        <div class="flex text-sm py-2">
            <x-checkbox label="Make it" uLabel="public" id="publish" name="publish" checked="{{$post->publish}}" />
        </div>

        {{-- content --}}
        <div class="py-4">
            <textarea name="content" id="editor" class="form-control" cols="30" rows="10">{{ $post->body }}</textarea>
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

@section('add-to-script')
<script src="{{ asset("/assets/ckeditor5/build/ckeditor.js") }}"></script>
<script>
    ClassicEditor
    				.create( document.querySelector( '#editor' ), {
    					
    				toolbar: {
    					items: [
    						'heading',
    						'|',
    						'bold',
    						'italic',
    						'link',
    						'bulletedList',
    						'numberedList',
    						'|',
    						'alignment',
    						'outdent',
    						'indent',
    						'fontColor',
    						'fontBackgroundColor',
    						'fontFamily',
    						'fontSize',
    						'removeFormat',
    						'strikethrough',
    						'underline',
    						'highlight',
    						'|',
    						'blockQuote',
    						'insertTable',
    						'imageInsert',
    						'mediaEmbed',
    						'codeBlock',
    						'code',
    						'undo',
    						'redo'
    					]
    				},
    				language: 'en',
    				image: {
    					toolbar: [
    						'imageTextAlternative',
    						'imageStyle:inline',
    						'imageStyle:block',
    						'imageStyle:side'
    					]
    				},
    				table: {
    					contentToolbar: [
    						'tableColumn',
    						'tableRow',
    						'mergeTableCells'
    					]
    				},
    					licenseKey: '',
    					
    					
    					
    				} )
    				.then( editor => {
    					window.editor = editor;
    			
    					
    					
    					
    				} )
    				.catch( error => {
    					console.error( 'Oops, something went wrong!' );
    					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
    					console.warn( 'Build id: tlmekwi91vd9-tckzugo3kf9g' );
    					console.error( error );
    				} );
</script>
@endsection