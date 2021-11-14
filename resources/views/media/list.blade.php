@extends('layouts.app')
@section('page-title', "Media's" )
@section('page-cta-link', route("media.create"))
@section('page-cta', "New Media")

@section('page-content')
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    @forelse ($media as $item)
        <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="mb-2">
            <img src="{{ asset("storage/".$item->path) }}" alt="">
            <input type="text" id="texttocopy" value="{{ asset("storage/".$item->path) }}" hidden >
        </div>
        <div>
            <p class="mb-4 text-sm font-medium text-gray-600 dark:text-gray-400">
                {{ $item->title }}
            </p>
            <p class="flex text-lg font-semibold text-gray-700 dark:text-gray-200 space-x-3">
                <button
                    onclick="copyText()"
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Like">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                        <path
                            d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                    </svg>
                </button>
                <a
                    href="{{ route("media.edit", $item) }}"
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Like">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </a>
            </p>
        </div>
    </div>    
    @empty
        <h1 class="text-lg text-white">No Media File Found :[</h1>
    @endforelse
</div>
@endsection

@section('add-to-script')
    <script type="text/javascript">
function copyText(){
var text = document.getElementById("texttocopy");
text.select();
document.execCommand("copy");
alert("Copy text to Clipboard: " + text.value);
}
</script>
@endsection