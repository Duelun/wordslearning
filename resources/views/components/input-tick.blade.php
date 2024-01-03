@props([
    'errorid' => '',
    'messages' => '',
    'req' => '',
    'id' => 'remember_me',
    'text' => '',
    'd_none' => 'd-none',
])

<label for="{{ $id }}" class="inline-flex items-center">
        <input id="{{ $id }}" name="{{ $id }}" type="checkbox" 
        {{ $attributes->merge(['class' => "d-inline-block text-bg-light rounded-1 border border-2 border-secondary-subtle" ]) }}
        <?php 
            if ($req != '') {
        ?>
        data-pristine-required {{ $attributes->merge(['data-pristine-required-message' => $req ]) }}
        <?php } ?>
        >
    <span class="text-bg-light ps-2 pb-2">{{ $text }}</span>
</label>

<x-input-error :errorid="$errorid" :messages="$messages" :d_none="$d_none" :color='"danger"'/>
