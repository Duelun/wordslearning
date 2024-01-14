@props([
    'class' => '',
    'key' => '',
    'meaning'
    ])

<div  class="d-flex justify-content-start w-100 {{ $class }}" data-parent="wordlist">
    <x-input-label class="visually-hidden id" :value="$meaning['id']" />
    <div class="d-inline-block p-1" style="width: 3rem; ">
    </div>
    <div class="d-inline-block p-1" style="width: 8rem; ">
        <x-input-label class="ownword" :value="$meaning['ownword']" />
    </div>
    <div class="d-inline-block p-1 ms-auto me-1" style="width: 3rem; ">
        <x-input-label class="phase" :value="$meaning['phase']" />
    </div>
</div>

