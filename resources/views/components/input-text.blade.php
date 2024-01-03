@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge(['class' => 'd-block w-100 text-bg-light py-1 rounded-1 border border-2 border-secondary-subtle form-control']) !!}>