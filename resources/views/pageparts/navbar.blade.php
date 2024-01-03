<div class=" d-block  m-0 mt-2 ">
    @can('admin', Auth::user())
        <div class="btn-toolbar justify-content-between" role="toolbar">
            <div class="btn-toolbar justify-content-between " role="toolbar">
                <div class="collapse {{ $adminshow }} collapse-horizontal multi-collapse" id='admin-nav'>
                    @include('pageparts.navbar-admin', ['hrefrole' => 'admin'])
                </div>
                <div class="collapse {{ $usershow }} collapse-horizontal multi-collapse" id='user-nav'>
                    @include('pageparts.navbar-user', ['hrefrole' => 'user'])
                </div>
            </div>
            <div class=" border-bottom border-black border-1 flex-grow-1 ">

            </div>
            <div class="btn-toolbar justify-content-end " role="toolbar">
                <div class="collapse show collapse-horizontal ">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light border border-1 border-black rounded-3 rounded-bottom-0 " href='#' 
                            data-bs-toggle="collapse" data-bs-target=".multi-collapse">Admin/User</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="btn-toolbar justify-content-between" role="toolbar">
            @include('pageparts.navbar-user', ['hrefrole' => 'user'])
            <div class="border-bottom border-black border-1 flex-grow-1 ">
            </div>
        </div>
    @endcan
</div>