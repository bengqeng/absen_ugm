@extends('app.admin.shared.main')

@section('content')
<!-- Profile simple -->
<div class="container-fluid bg-profile rounded-bottom-1">
    <div class="row">
        <div class="col p-4">
            <button type="button"
                class="btn btn-light text-tropmed d-flex align-items-center m-0 p-2 position-relative rounded-pill float-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil"
                    viewBox="0 0 16 16">
                    <path
                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                </svg>
                <small class="fw-bold">
                    &nbsp;Ubah Profil
                </small>
            </button>
        </div>
    </div>
    <div class="image-header my-3">
        <img loading="lazy" src="https://i.pravatar.cc/100" class="mx-auto d-block rounded-circle" alt="...">
    </div>
    <div class="row">
        <div class="col text-center mb-4">
            <span class="text-white fw-semibold">
                Reza Velayani
            </span><br>
            <span class="text-white">
                Administrator
            </span>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col my-4">
            <div class="d-grid gap-2">

                <button class="btn btn-lg btn-outline-warning px-4 d-block rounded-4 dropdown-toggle"
                    style="text-align:left;" type="button" data-bs-toggle="collapse" href="#collapseSetting">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-gear" viewBox="0 0 16 16">
                        <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                        <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                    </svg>
                    &nbsp;Pengaturan
                </button>
                <div class="collapse" id="collapseSetting">
                    <ul class="list-group no-markers">
                        <li><a class="list-group-item" href="{{ route('admin.user.index') }}">Data Staf</a></li>
                        <li><a class="list-group-item" href="{{ route('admin.project.index') }}">Data Project</a>
                        </li>
                        <li><a class="list-group-item" href="{{ route('admin.settings.ip.index') }}">IP Public</a></li>
                    </ul>
                </div>
                <button class="btn btn-lg btn-outline-primary px-4 d-block rounded-4 dropdown-toggle"
                    style="text-align:left;" type="
                                                                            button" data-bs-toggle="collapse"
                    href="#collapseAsset">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-archive" viewBox="0 0 16 16">
                        <path
                            d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    &nbsp;Aset
                </button>
                <div class="collapse" id="collapseAsset">
                    <ul class="list-group no-markers">
                        <li><a class="list-group-item" href="{{ route('admin.asset.index') }}">List Aset</a></li>
                        <li><a class="list-group-item" href="{{ route('admin.asset_category.index') }}">List Kategori
                                Aset</a></li>
                    </ul>
                </div>
                <a class="btn btn-lg rounded-4 px-4 text-center text-danger border-0" style="text-align:left;"
                    type="button" href="{{ route('auth.logout') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>
                    &nbsp;Keluar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection