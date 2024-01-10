
@include('scripts.userdictsets')

<!-- List -->
<div class="dictList" id="userDictList">
    <!-- Main dict -->
    @include('user.modules.dictlist-line', ['name' => 'default', 'lang1' => '--', 'lang2' => '--', 'class' => 'blueprint visually-hidden'])

    <!-- Custom dicts -->
    @foreach(session('userdictionaries') as $dict)
        @include('user.modules.dictlist-line', ['id' => $dict['id'], 'name' => $dict['name'], 'lang1' => $dict['langown'], 'lang2' => $dict['langforeign'],
                'number' => $dict['number'], 'class' => 'record'])
    @endforeach
</div>

<!-- New -->
<form method="POST" action="{{ route('dictlist') }}" id="{{ 'dictList' }}" >
    @csrf
    <div class="d-flex justify-content-between align-items-end flex-wrap mb-2">
        <x-input-text class="visually-hidden id" id="dictListId" name="id" />
        <div class="d-flex flex-wrap align-items-start me-2">
            <div class="d-inline-block p-1" style="width: 14rem; ">
                <x-input-label :value="__('Name')" />
                <x-input-text class="name" id="dictListNew" name="newname"/>
            </div>
            <div class="d-inline-block p-1" style="width: 8rem; ">
                <x-input-label :value="__('Own')" />
                <x-input-dropdown class="lang1" id="dictListOwn" name="ownlang" :datas="session('fulllanglist')" :active="session('usernative')"/>
            </div>
            <div class="d-inline-block flex-shrink-0 flex-grow-0 ms-2 p-1 align-items-center" style="width: 2rem; ">
                ->
            </div>
            <div class="d-inline-block p-1" style="width: 8rem; ">
                <x-input-label :value="__('Learned')" />
                <x-input-dropdown class="lang2" id="dictListLearned" name="learnlang" :datas="session('fulllanglist')" :active="session('userlearn')"/>
            </div>
        </div>
        <!-- Button -->
        <div class="d-flex justify-content-end align-items-end ms-auto">
            <div class="d-inline-block" id="dictListspinner">
                Spiner
            </div>
            <div class="d-inline-block">
                <x-input-button :formname="'dictList'" :buttontext="__('Save')"/>
            </div>
        </div>
    </div>
    <div class="pristine-form">
        <x-input-error :errorid="'dictList_newname_error'"/>
    </div>
</form>


