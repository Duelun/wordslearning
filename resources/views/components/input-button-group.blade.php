@props([
    'formname' => 'x',
    'route' => '#',

    ])

<div class="d-flex justify-content-end w-100">
    <div class=' d-flex justify-content-center flex-shrink-1 flex-grow-1'>
        <span class="spinner-border d-none" id='{{ $formname }}spinner'></span>
        <span class="message" id='{{ $formname }}message'></span>
    </div>
    <div class='d-inline-block flex-shrink-0 flex-grow-0 mx-3 cancel'>
        <button type ='button' class = 'btn btn-warning px-4'  formaction="{{ $route }}">
            <span class=""> {{ __('Cancel') }} </span>
        </button>
    </div>
    <div class='d-inline-block flex-shrink-0 flex-grow-0 mx-3 delete'>
        <button type ='button' class = 'btn btn-danger px-4'  formaction="{{ $route }}delete">
            <span class=""> {{ __('Delete') }} </span>
        </button>
    </div>
    <div class='d-inline-block flex-shrink-0 flex-grow-0 mx-3 modify'>
        <button type ='button' class = 'btn btn-success px-4'  formaction="{{ $route }}modify">
            <span class=""> {{ __('Modify') }} </span>
        </button>
    </div>
    <div class='d-inline-block flex-shrink-0 flex-grow-0 mx-3 save'>
        <button type ='button' class = 'btn btn-primary px-4'  formaction="{{ $route }}save">
            <span class=""> {{ __('Save') }} </span>
        </button>
    </div>

</div>
