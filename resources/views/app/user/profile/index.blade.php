@extends('app.user.shared.main')

@section('content')
<!-- button Setting and log out -->
<div class="container">
    <div class="row">
        {{-- <div class="row" style="height:80vh"> --}}
            <div class="col my-4">
                <div class="d-grid gap-2">
                    <div class="profile-asset mb-3">
                        <h2 class="fs-4 fw-bold">Profile</h2>
                        <ul class="list-group no-markers">
                            <li>
                                <div class="list-group-item bg-transparent border-0 border-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <span class="ms-2">{{auth()->user()->name}}</span>
                                </div>
                            </li>
                            <li>
                                <div class="list-group-item bg-transparent border-0 border-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-mailbox2" viewBox="0 0 16 16">
                                        <path
                                            d="M9 8.5h2.793l.853.854A.5.5 0 0 0 13 9.5h1a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5H9v1z" />
                                        <path
                                            d="M12 3H4a4 4 0 0 0-4 4v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7a4 4 0 0 0-4-4zM8 7a3.99 3.99 0 0 0-1.354-3H12a3 3 0 0 1 3 3v6H8V7zm-3.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0c0 .334-.164.264-.415.157z" />
                                    </svg>
                                    <span class="ms-2">{{auth()->user()->email}}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a class="btn btn-lg btn-outline-success rounded-4 px-4" style="text-align:left;" type="button"
                        href="{{ route('auth.logout') }}">
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