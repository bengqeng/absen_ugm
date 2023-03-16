<header class="py-2 mb-2 sticky-top bg-light shadow-sm border-bottom">
    @if(Request::url() === route('admin.dashboard.index') || Request::url() === route('admin.attendance.index') ||
    Request::url() === route('admin.asset_submission.index')||
    Request::url() === route('admin.profile.index'))
    <div class="container-fluid d-grid">
        <div class="col-12 text-center"><span class="fw-semibold">Admin Tropmed</span> <small class="text-mu
                                                ">version 0.1</small></div>
    </div>
    @else
    <div class="container-fluid d-grid" style="grid-template-columns: 1fr 12fr;">
        <a href="{{url()->previous()}}" class="text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </a>
        <div class="col-12 text-center"><span class="fw-semibold">Admin Tropmed</span> <small class="text-mu
                                            ">version 0.1</small></div>
    </div>
    @endif

</header>