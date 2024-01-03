@props([
    'id' => 'x',
    'd_none' => 'd-none',
    'tooltiptext' => '',
    'color' => 'info'
])

<div id="{{ $id }}_tooltipbutton" class="id-tooltip id-{{ $color }} {{ $d_none }} flex-grow-0 flex-shrink-0 ">
    <a href="#" id="{{ $id }}_tooltip" class="" data-bs-placement="bottom" data-bs-toggle="tooltip" data-bs-html="true" 
            data-bs-title=" {{ $tooltiptext }} " data-bs-custom-class="tooltip-{{ $color }}"
            data_bs_template='<div class="tooltip-inner"></div>' >
        <i class="bi bi-info-square-fill text-{{ $color }} p-0 m-0 " fill="currentColor" style="font-size: 1rem;"></i> 
    </a>
</div>