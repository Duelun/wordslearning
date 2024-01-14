@props([
    'route' => '#',
    'id' => 'x'

])
<div class="visually-hidden" id="dictlistblueprints">
    <form method="POST" action="{{ route($route) }}" id="{{ $id }}">
        @csrf
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-2">
            <x-input-text class="visually-hidden id" name="id" value="empty"/>
            <div class="d-flex flex-wrap align-items-start me-2">
                <div class="d-inline-block p-1" style="width: 14rem; ">
                    <x-input-label :value="__('Name')" />
                    <x-input-text class="name" name="newname"/>
                </div>
                <div class="d-inline-block p-1" style="width: 8rem; ">
                    <x-input-label :value="__('Learned')" />
                    <x-input-dropdown class="lang1" name="learnlang" :datas="session('fulllanglist')" :active="session('userlearn')"/>
                </div>
                <div class="d-inline-block flex-shrink-0 flex-grow-0 ms-2 p-1 align-items-center" style="width: 2rem; ">
                    ->
                </div>
                <div class="d-inline-block p-1" style="width: 8rem; ">
                    <x-input-label :value="__('Own')" />
                    <x-input-dropdown class="lang2" name="ownlang" :datas="session('fulllanglist')" :active="session('usernative')"/>
                </div>
            </div>
        </div>
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
    @include('user.modules.dictlist-line', ['name' => 'default', 'lang1' => 'Custom', 'lang2' => 'Custom', 'class' => 'blueprint'])
</div>
