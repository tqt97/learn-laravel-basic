@props(['active'])

@php
$classes = $active ?? false ? 'flex items-center relative active-nav shadow-lg rounded-l-lg border-l-2 mt-4 py-2 px-6 bg-gray-700 bg-opacity-50 text-gray-100 transition duration-150 ease-in-out border-white' : 'flex items-center mt-4 py-2 px-6 text-gray-500 hover:text-gray-100 transition duration-150 ease-in-out ml-1';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
