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
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @include('layouts.notification')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $header }}
                    </h2>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
        @include('layouts.undo')

            {{ $slot }}
        </main>
    </div>
</body>

</html>
