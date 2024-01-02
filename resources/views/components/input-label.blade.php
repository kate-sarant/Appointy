@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg uppercase text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
