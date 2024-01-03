@props([
    'id' => 'x',
    'formname' => 'x',
    'buttontext' => 'Send'
    ])

<div class=" position-relative mt-1 " style='height:4rem'>
    <div class=' d-inline-block justify-content-center w-50 start-0 '>
        <span class=" spinner-border d-none " id='{{ $formname }}spinner'></span>
        <span class=" message" id='{{ $formname }}message'></span>
    </div>
    <div class=' d-inline-block w-50 position-absolute end-0 pristine-form'>
        <button type ='submit'
                id =  "{{ $id }}button"
                class = 'position-absolute start-50 translate-middle-x btn btn-primary px-4'>
            <span class=""> {{ $buttontext }} </span>
        </button>
    </div>
</div>
