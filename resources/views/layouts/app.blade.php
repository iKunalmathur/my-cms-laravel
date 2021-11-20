<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyCMS | @yield('page-title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/tailwind/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/assets/tailwind/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="/assets/tailwind/js/charts-lines.js" defer></script>
    <script src="/assets/tailwind/js/charts-pie.js" defer></script>

        <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
        .capitalize{
            text-transform: capitalize
        }
    </style>


    @yield('add-to-head')
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        {{-- Sidebar --}}
        @include('layouts.sidebar')
        <div class="flex flex-col flex-1 w-full">
            {{-- Header/Top Navigation --}}
            @include('layouts.header')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        @yield('page-title')
                    </h2>
                    {{-- Alerts & Notifications --}}
                    @include('layouts.alerts')

                    {{-- Page-Content --}}
                    @section('page-content')

                    @show
                </div>
            </main>
        </div>
    </div>

    {{-- Scripts --}}
    @yield('add-to-script')
</body>

</html>