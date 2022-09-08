<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Learn laravel basic - laravel framework" />
    <meta name="author" content="Codethoi - Sep 2020 " />
    <!--  Essential META Tags -->
    <meta property="og:title" content="Learn laravel bacsic" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ asset('assets/images/banner.jpg') }}" />
    <meta property="og:image" content="{{ asset('assets/images/banner.jpg') }}" />
    <meta name="twitter:card" content="learn_laravel_basic">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:description" content="Learn laravel basic - laravel framework">
    <meta property="og:site_name" content="Learn laravel basic - Codethoi">
    <meta name="twitter:image:alt" content="learn_laravel_basic">

    <!--  Non-Essential, But Required for Analytics -->
    {{-- <meta property="fb:app_id" content="your_app_id" /> --}}
    {{-- <meta name="twitter:site" content="@website-username"> --}}

    <title>
        @if (isset($title))
            {{ $title }}
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.svg') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.header')
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto p-1">
                    @if (isset($header))
                        <div class="container mx-auto ">
                            <div class="py-3 sm:px-0 px-5">
                                <h3 class="text-indigo-800 text-xl font-bold">
                                    {{ $header }}
                                </h3>
                            </div>
                        </div>
                    @endif
                    @include('layouts.notification')

                    @include('layouts.undo')

                    <div class="flex flex-col my-3">
                        <div class="overflow-x-auto">
                            <div
                                class="p-5 bg-white shadow-lg align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b border-gray-200">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
