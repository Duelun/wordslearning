@props([
    'id' => '',
    'checked' => '',
    'value' => '1'
])

<div class="form-check form-switch d-inline-block d-flex justify-content-end ">
    <input id={{ $id }} name={{ $id  }} value={{ $value }} class="form-check-input" type="checkbox" role="switch"
           style="box-shadow: 0rem 0rem 0.4rem 0.2rem var(--bs-secondary);" {{ $checked }}>
</div>

