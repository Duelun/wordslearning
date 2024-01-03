@include('pageparts.header')

<!-- scripts -->
@include('scripts.formajax')

<!-- Headline -->
@include('pageparts.head', ['logicon' => 'bi-box-arrow-left', 'panel' => 'logout', 'langicon' => 'gb'])

<div class="position-relative start-50 translate-middle-x w-75 m-2"
    style="">

    <!-- check link -->
    <?php 
        if(Session::get('page')){
            if (Session::get('admin')){
                $adminshow = 'show';
                $usershow = '';
                $pagelink = 'admin';
            } else {
                $adminshow = '';
                $usershow = 'show';
                $pagelink = 'user';
            }
            $pagex = Session::get('page');
            $pagelink = $pagelink.'.'.$pagex;
        } else {
            $adminshow = 'show';
            $usershow = '';
            $pagelink = 'user.learning';
        };
    ?>

    <!-- navbar -->
    @include('pageparts.navbar')

    <!-- content -->
    <div class="d-block p-2 w-100 border border-secondary border-1 border-top-0 rounded-2 rounded-top-0 min-vh-100 mt-0 ">

        @include($pagelink)

    </div>

</div>

<!-- Foot -->
@include('pageparts.foot')


