@props([
    'id' => '3',
    'name' => 'x',
    'lang1' => 'x',
    'lang2' => 'x',
    'number' => '10',
    'class' => ''
    ])

<div class="d-flex justify-content-between flex-wrap mb-2 {{ $class }}">
        <x-input-label class="visually-hidden id" :value="$id" />
    <div class="d-flex flex-wrap align-items-start me-2">
        <div class="d-inline-block p-1" style="width: 14rem; ">
            <x-input-label class="name" :value="$name" />
        </div>
        <div class="d-inline-block p-1" style="width: 8rem; ">
            <x-input-label class="lang1" :value="$lang1" />
        </div>
        <div class="d-inline-block flex-shrink-0 flex-grow-0 ms-2 p-1 align-items-center" style="width: 2rem; ">
            ->
        </div>
        <div class="d-inline-block p-1" style="width: 8rem; ">
            <x-input-label class="lang2" :value="$lang2" />
        </div>
    </div>
    <div class="d-flex align-items-start flex-shrink-0 flex-grow-0 ms-auto">
        <div class="d-inline-block align-items-center p-1 pb-1 me-1" style="width: 2rem; ">
            <x-input-label class="number" :value="$number" />
        </div>
    </div>
</div>
