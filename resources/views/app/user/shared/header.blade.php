<!-- navbar -->
<section>
    <header class="py-2 sticky-top bg-profile text-light">
        <div class="container-fluid d-grid" style="grid-template-columns: 1fr 12fr;">
            <div class="image-header">
                <img loading="lazy" src="{{ asset('images/avatar.jpg') }}" style="width: 30px"
                    class="mx-auto d-block rounded-circle" alt="...">
            </div>
            <div class="col-12 text-center"><span class="fw-semibold">{{auth()->user()->name}}</span> <small class="text-mu
                                            ">Staf</small></div>
        </div>
    </header>
    <nav
        class="navbar fixed-bottom rounded-top-1 py-3 d-flex navbar-light bg-white text-center justify-content-around shadow-lg mt-3">
        <div class="navbar-brand m-0 p-2 {{ (request()->is('staff/dashboard*')) ? 'active' : '' }}">
            <a class="btn btn-tropmed align-items-center pt-0 p-1" href="{{ route('staff.dashboard.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house"
                    viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg>
            </a><br>
            <span class="fw-bold text-dark" style="font-size: 0.6em;">Beranda</span>
        </div>
        <div class="navbar-brand m-0 p-2 {{ (request()->is('staff/attendance*')) ? 'active' : '' }}">
            <a class="btn btn-tropmed align-items-center pt-0 p-1" href="{{ route('staff.attendance.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-geo-alt"
                    viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
            </a><br>
            <span class="fw-bold text-dark" style="font-size: 0.6em;">Presensi</span>
        </div>
        <div class="navbar-brand m-0 p-2 {{ (request()->is('staff/asset_submission*')) ? 'active' : '' }}">
            <a class="btn btn-tropmed align-items-center pt-0 p-1"
                href="{{ route('staff.asset_submission.index',['user'=>auth()->user()->id]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-pc-display" viewBox="0 0 16 16">
                    <path
                        d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V1Zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0ZM9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5ZM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5ZM1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2H1.5Z" />
                </svg>
            </a><br>
            <span class="fw-bold text-dark" style="font-size: 0.6em;">Aset</span>
        </div>
        <div class="navbar-brand m-0 p-2 {{ (request()->is('staff/profile*')) ? 'active' : '' }}">
            <a class="btn btn-tropmed align-items-center pt-0 p-1" href="{{ route('staff.profile.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
                    <path
                        d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z" />
                </svg>
            </a><br>
            <span class="fw-bold text-dark" style="font-size: 0.6em;">Lainnya</span>
        </div>
    </nav>
</section>