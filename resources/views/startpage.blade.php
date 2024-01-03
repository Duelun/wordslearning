@include('pageparts.header')

<!-- unic scripts -->
<script src="/js/pristine/pristine.js"  type="text/javascript" defer></script>

<!-- Headline -->
@include('pageparts.head', ['logicon' => 'bi-box-arrow-in-right', 'panel' => 'login', 'langicon' => 'gb'])


<!-- page -->
<div class="position-relative start-50 translate-middle-x w-75 border border-info m-2 min-vh-100 "
    style="">

<!-- content -->
    <div class="wrapper position-absolute start-50 translate-middle-x w-75 gap-2 my-2 " style=' display:grid'>
        <div class="border border-2 border-danger rounded-3 " style='grid-column: 1 / 5; grid-row: 1; min-height: 5rem'>One</div>
        <div class="border border-2 border-danger rounded-3 " style='grid-column: 1 / 4; grid-row: 2; min-height: 10rem'>Two</div>
        <div class="border border-2 border-danger rounded-3 " style='grid-column: 4; grid-row: 2; min-height: 10rem'>Three</div>
        <div class="border border-2 border-danger rounded-3 " style='grid-column: 1; grid-row: 3; min-height: 10rem'>Four</div>
        <div class="border border-2 border-danger rounded-3 " style='grid-column: 2 / 5; grid-row: 3; min-height: 10rem'>Five</div>
        <div class="border border-2 border-danger rounded-3 " style='grid-column: 1 / 4; grid-row: 4; min-height: 10rem'>Six</div>
        <div class="border border-2 border-danger rounded-3 " style='grid-column: 4; grid-row: 4; min-height: 10rem'>Seven</div>
    </div>
</div>

<!-- Foot -->

@include('pageparts.foot')
