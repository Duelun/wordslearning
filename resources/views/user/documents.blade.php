
<div class="accordion" id="documentsContent">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#howitworks" aria-expanded="true" aria-controls="howitworks">
                {{ __('docHowitworks.Head1') }}
            </button>
        </h2>
        <div id="howitworks" class="accordion-collapse collapse show" data-bs-parent="#documentsContent">
            <div class="accordion-body">
                <strong>{{ __('docHowitworks.T1') }}. </strong> <br> {{ __('docHowitworks.T2') }}
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#termACond" aria-expanded="false" aria-controls="termACond">
                {{ __('docTC.Head1') }}
            </button>
        </h2>
        <div id="termACond" class="accordion-collapse collapse" data-bs-parent="#documentsContent">
            <div class="accordion-body">
                <strong>{{ __('docTC.T1') }}. </strong> <br> {{ __('docTC.T2') }}
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privPol" aria-expanded="false" aria-controls="privPol">
                {{ __('docPriv.Head1') }}
            </button>
        </h2>
        <div id="privPol" class="accordion-collapse collapse" data-bs-parent="#documentsContent">
            <div class="accordion-body">
                <strong>{{ __('docPriv.T1') }}. </strong> <br> {{ __('docPriv.T2') }}
            </div>
        </div>
    </div>
</div>
