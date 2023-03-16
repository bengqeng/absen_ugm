<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('user/js/app.js') }}"></script>
    <title>Dashboard | Tropmed</title>
</head>

<body class="bg-light">

    @include('app.user.shared.header')
    <!-- content -->
    <section>
        @include('app.user.shared.flash_message')
        @yield('content')
    </section>

    @include('app.user.shared.footer')

    <!-- divider footer -->
    <div class="b-example-divider"></div>
    <!-- end divider footer -->

    @include('app.user.shared.modal')
    <!-- modal check in -->
    <section>
        <div class="modal" id="myModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="">
                            Anda sudah terhubung dengan<br>
                            Jaringan Internet<br>
                            Pusat Kedokteran Tropis FK-KMK UGM
                        </p>
                        <p class="fw-bold lh-lg">11/02/2023 08:00:01</p>
                        <span class="text-success">
                            <svg style="filter: drop-shadow(4px 4px 1px rgb(0 0 0 / 0.4));"
                                xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor"
                                class="bi bi-wifi" viewBox="0 0 16 16">
                                <path
                                    d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z" />
                                <path
                                    d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z" />
                            </svg>
                        </span>
                    </div>
                    <div class="modal-footer justify-content-center border-0 mb-4">
                        <a type="button" class="btn btn-lg btn-success btn-tropmed px-5"
                            href="{{ route('staff.checkin.create') }}">Check In</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>