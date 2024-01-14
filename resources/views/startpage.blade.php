@include('pageparts.header')

<!-- unic scripts -->
<script src="/js/pristine/pristine.js"  type="text/javascript" defer></script>

<!-- Headline -->
@include('pageparts.head', ['logicon' => 'bi-box-arrow-in-right', 'panel' => 'login', 'langicon' => 'gb'])


<!-- page -->
<div class="d-flex justify-content-center w-100 mb-2 min-vh-100 ">

<!-- content -->
    <div class="container text-center w-75 gap-2 my-2 ">
        <div class="row m-5" style='min-height: 5rem'>
            <div class="col d-flex justify-content-center align-items-center p-3 border border-0 rounded-3"
                 style="box-shadow: 0rem 0rem 1rem 0.5rem var(--bs-secondary);">
                <div> {{ __('start.t01') }}</div></div>
        </div>
        <div class="row m-5" style='min-height: 10rem'>
            <div class="col-8 d-flex justify-content-center align-items-center me-5 p-3 border border-0 rounded-3">
                <div> {{ __('start.t02') }} </div>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <img src="/pictures/start1.png" class="img-fluid" alt="" style="box-shadow: 0rem 0rem 1rem 0.5rem var(--bs-secondary);"></div>
        </div>
        <div class="row m-5" style='min-height: 10rem'>
            <div class="col d-flex justify-content-center align-items-center">
                <img src="/pictures/start2.jpg" class="img-fluid" alt="" style="box-shadow: 0rem 0rem 1rem 0.5rem var(--bs-secondary);"></div>
            <div class="col-8 d-flex justify-content-center align-items-center ms-5 p-3 border border-0 rounded-3">
                <div> {{ __('start.t03') }}</div>
            </div>
        </div>
        <div class="row m-5" style='min-height: 10rem'>
            <div class="col-8 d-flex justify-content-center align-items-center me-5 p-3 border border-0 rounded-3">
                <div> {{ __('start.t04') }}</div>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <img src="/pictures/start3.jpg" class="img-fluid" alt="" style="box-shadow: 0rem 0rem 1rem 0.5rem var(--bs-secondary);"></div>
        </div>
        <div class="row m-5" style='min-height: 10rem'>
            <div class="col d-flex justify-content-center align-items-center">
                <img src="/pictures/start4.jpg" class="img-fluid" alt="" style="box-shadow: 0rem 0rem 1rem 0.5rem var(--bs-secondary);"></div>
            <div class="col-8 d-flex justify-content-center align-items-center ms-5 p-3 border border-0 rounded-3">
                <div> {{ __('start.t05') }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Foot -->

@include('pageparts.foot')
