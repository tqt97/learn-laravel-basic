@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block font-semibold text-md text-gray-700']) }}>
    {{ $value ?? $slot }}
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>
