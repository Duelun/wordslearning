
<!-- List -->
<div class="dictList" id="userDictList">
    @foreach(session('userdictionaries') as $dict)
        @include('user.modules.dictlist-line', ['id' => $dict['id'], 'name' => $dict['name'], 'lang2' => $dict['langown'], 'lang1' => $dict['langforeign'],
                'number' => $dict['number'], 'class' => 'record', 'dataset_parent' => 'dictlist'])
    @endforeach
</div>

<!-- button -->
<div class="d-flex justify-content-end p-2 pe-5">
    <button type ='button' id="Newdictbutton" class ='btn btn-primary px-4'>
        <span class=""> {{ __('New Dictionary') }} </span>
    </button>
</div>


<!-- form -->
@include('user.modules.dictlist-form', ['route' => 'dictlist', 'id' => 'dictlist'])
