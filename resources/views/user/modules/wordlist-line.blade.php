@props([
    'class' => '',
    'key' => 'yyy',
    'record'
    ])

<?php $recordnum = sizeof($record['meanings']); ?>
<div class="w-100 mb-2" data-recordnum="{{ $recordnum }}">
    <x-input-label class="visually-hidden id" :value="'#" /> <!-- azonosítani kell??? -->
    <div class="d-flex justify-content-between w-100">
        <div class="d-inline-block p-1" style="width: 14rem; ">
            <x-input-label class="word" :value="$key" />
        </div>
        <div class="d-inline-flex flex-wrap align-items-end me-2">,
            <div class="d-inline-block p-1" style="width: 4rem; ">
                <x-input-label class="wordclass" :value="$record['wordclass']" />
            </div>
            <div class="d-inline-block p-1" style="width: 8rem; ">
                <x-input-label class="lang1" :value="$record['learnedlang']" />
            </div>
            <div class="d-inline-block flex-shrink-0 flex-grow-0 ms-2 p-1 align-items-center" style="width: 2rem; ">
                ->
            </div>
            <div class="d-inline-block p-1" style="width: 8rem; ">
                <x-input-label class="lang2" :value="$record['ownlang']" />
            </div>
        </div>
    </div>

    @foreach($record['meanings'] as $meaning)
        <!-- Records in word -->
        @include('user.modules.wordlist-record-line', ['class' => $class, 'key' => '', 'meaning' => $meaning])
    @endforeach
</div>
