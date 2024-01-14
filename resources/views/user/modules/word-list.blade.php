

<!-- List -->
<div class="wordList" id="userWordList">
    <?php foreach (session('userwordlist') as $key => $record){ ?>
        @include('user.modules.wordlist-line', ['key' => $key, 'record' => $record, 'class' => 'record'])
    <?php } ?>
</div>

<!-- Button -->
<div class="d-flex justify-content-end p-2 pe-5">
    <button type ='button' id="Newwordbutton" class ='btn btn-primary px-4'>
        <span class=""> {{__('New Word')}} </span>
    </button>
</div>


<!-- Form -->
@include('user.modules.wordlist-form', ['route' => 'wordlist', 'id' => 'wordlist'])
