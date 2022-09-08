@props(['active'])

@php
$classes = $active ?? false ? 'flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-50 text-gray-100 transition duration-150 ease-in-out border-l-2 border-indigo-500' : 'flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-50 hover:text-gray-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
