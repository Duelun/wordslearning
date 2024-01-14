@props([
    'boxid'=>'x',
    'contentpach'=>''
])


<div class="modal fade" id={{$boxid}} data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                {{ $contentpach }}
            </div>
        </div>
    </div>
</div>
