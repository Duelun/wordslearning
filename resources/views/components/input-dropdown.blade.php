@props([
    'value' => '',
    'datas' => [' '],
    'width' => '8',
    'active' => ''
    ])

<select {{ $attributes->merge(['class' => 'd-block form select text-bg-light']) }} style="width: {{ $width }}rem">
    @if ($datas)
        @foreach ($datas as $data)
            <option value="{{ $data }}"
                @if ($data == $active) {{ 'selected' }} @endif>
                {{ __($data) }}
            </option>
        @endforeach
    @else
        <option value="Null" selected>
            Null
        </option>
    @endif
</select>
