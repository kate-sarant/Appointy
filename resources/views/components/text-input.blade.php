@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-center
p-3 border-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
