@props([
    'route' => '#',
    'id' => 'x'

])
<div class="" id="wordlistblueprints">
    <form method="POST" action="{{ route($route) }}" id="{{ $id }}">
        @csrf
        <!-- word basic det-->
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-2">
            <x-input-text class="visually-hidden id" name="id" value="empty"/>
            <div class="d-flex flex-wrap align-items-start me-2">
                <div class="d-inline-block flex-fill p-1" style="width: 14rem; ">
                    <x-input-label :value="__('Foreign word')" />
                    <x-input-text class="foreignword" name="foreignword"/>
                </div>
                <div class="d-inline-block flex-fill p-1 me-2" style="width: 8rem; ">
                    <x-input-label :value="__('Wordclass')" />
                    <x-input-dropdown class="wordclass" name="wordclass" :datas="session('fullwordclasslist')" :active="'Custom'"/>
                </div>
                <div class="d-inline-block flex-fill p-1" style="width: 8rem; ">
                    <x-input-label :value="__('Learned')" />
                    <x-input-dropdown class="lang1" name="learnlang" :datas="session('fulllanglist')" :active="session('userlearn')"/>
                </div>
                <div class="d-inline-block flex-shrink-0 flex-grow-0 ms-2 p-1 align-items-center" style="width: 2rem; ">
                    ->
                </div>
                <div class="d-inline-block flex-fill p-1" style="width: 8rem; ">
                    <x-input-label :value="__('Own')" />
                    <x-input-dropdown class="lang2" name="ownlang" :datas="session('fulllanglist')" :active="session('usernative')"/>
                </div>
            </div>
        </div>
        <!-- description -->
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-2">
            <div class="d-inline-block p-1" style="width: 14rem; ">
                <x-input-label :value="__('IPA')" />
                <x-input-text class="ipa" name="ipa"/>
            </div>
            <div class="d-inline-block flex-grow-1 flex-shrink-1 p-1">
                <x-input-label :value="__('Meaning')" />
                <x-input-text class="foreignmeaning" name="foreignmeaning"/>
            </div>
        </div>
        <!-- sentence -->
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-2">
            <div class="d-inline-block flex-grow-1 flex-shrink-1 p-1">
                <x-input-label :value="__('Sentence')" />
                <x-input-text class="foreignsentence" name="foreignsentence"/>
            </div>
        </div>
        <!-- own word -->

        <!-- Buttons -->
        <div class="m-1 mt-3">
            <x-input-button-group :formname="$id" :route="route($route)" />
        </div>
        <div class="pristine-form m-1 mt-2">
            <?php $errorid = $id.'_bagged_error' ?>
            <x-input-error :errorid="$errorid"/>
        </div>
    </form>
    <div id="lang1store">session('userlearn')</div>
    <div id="lang2store">session('usernative')</div>
    <?php
        $record = array('learnedlang' => 'learnedlang', 'ownlang' => 'ownlang', 'wordclass' => 'wordclass',
            'meanings' => array( '0' => array('id' => 'id', 'ownword' => 'ownword', 'phase' => 'phase')));
        ?>
    @include('user.modules.wordlist-line', ['class' => 'blueprint', 'key' => 'yy', 'record' => $record])
</div>
