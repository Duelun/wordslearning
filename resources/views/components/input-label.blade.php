@props(['value'])

<label {{ $attributes->merge(['class' => 'd-block text-bg-light pb-1']) }}>
    {{ $value }}
</label>
