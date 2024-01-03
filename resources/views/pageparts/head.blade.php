<!-- Head content -->
<div class="d-flex justify-content-between align-items-center w-100 bg-primary" style="min-height:4rem; height:100px; max-height:10vh">
    <p class=" d-inline-block ms-2 ms-md-4 fs-3 fst-italic fw-bold text-light opacity-100 ">
        {{ __('Learning Words') }}
    </p>

    <div class=" align-self-end mb-2" id="statonpagehead">
        {{session('userlangtext', 'aaa ')}}
    </div>

    <!-- Button group -->
    <div class="d-inline-block d-flex justify-content-between align-items-center me-2 me-md-4 h-100 "
        style="">
        <!-- loginregout -->
        <div class="d-inline-block p-0 m-0 me-1"
            data-bs-toggle="modal" data-bs-target="#{{{ $panel }}}" type="button">
            <i class="bi bi-person-square text-black p-0 m-0 z-2" fill="currentColor" style="font-size: 3rem;"></i>
            <i class="bi {{ $logicon }} text-white p-0 m-0 z-3 position-relative " fill="currentColor"
                    style="font-size: 1.5rem; left: -1.95rem; bottom: -0.3rem"></i>
        </div>
        <!-- Languages -->
        <div class=" position-relative me-3" style="height:3.5rem; width:3.5rem">
            <div class=" position-absolute btn d-inline-block border-0"
                style="background-image:url(pictures/flags/{{ session('currentflag', 'gb') }}.png); background-size:100% auto; background-position:center; background-repeat:no-repeat;
                    height:3.5rem; width:3.5rem"
                data-bs-toggle="collapse" href="#collapseflag">
            </div>
            <!-- Dropdown -->
            <div class=" position-absolute collapse pt-2 opacity-100 " id="collapseflag" style=" margin-top: 3rem; left:0.5rem">
                @if(session('activeflags'))
                    @foreach (session('activeflags', '') as $activeflag)
                        <div class="">
                            <a type="button" class=" d-block"  href="{{ route('changelang', [$activeflag]) }}"
                                style="background-image:url(pictures/flags/{{ $activeflag }}.png); background-size:100% auto; background-position:center; background-repeat:no-repeat;
                                height:2.5rem; width:2.5rem">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<!-- login/register/logout forms -->
@include('pageparts.userforms')


