@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300  focus:ring  focus:ring-blue-300 focus:border-blue-500']) !!}>
