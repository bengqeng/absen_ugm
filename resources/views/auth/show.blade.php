<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="/js/app.js"></script>
    <style type="text/css">
        /* Required for proper centering */
        html,
        body {
            height: 100vh;
            width: 100vw;
        }
    </style>
</head>

<body>
    <section>
        <div class="container-fluid d-flex justify-content-center align-items-center"
            style="height:100vh; overflow:hidden;">
            <!-- Inner row, half the width and height, centered, blue border -->
            <div class="row d-flex align-items-center w-100" style="overflow:hidden; max-width: 1080px;">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class=" col-md-6 d-none d-md-block">
                    <div class="">
                        <img src="https://picsum.photos/500/500" style="object-fit:cover"
                            class="card-img fit-cover  rounded" alt="...">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 p-sm-2 p-md-5">
                    <div class="image-header mb-4">
                        <img src="{{ asset('images/logo_tropmed.png') }}" class="mx-auto d-block" alt="...">
                    </div>
                    <form method="POST" action="{{ route('auth.verify') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="input-group mb-3" id="show_hide_password">
                            <div class="form-floating">
                                <input name="password" type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <span class="input-group-text bg-transparent">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye-slash" viewBox="0 0 16 16">
                                        <path
                                            d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                        <path
                                            d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                        <path
                                            d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye d-none" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </a>
                            </span>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success btn-tropmed my-3 px-4">Login</button>
                        </div>
                    </form>
                    <span class="text-dark">
                        <p class="card-text"><small class="text-muted">Lupa password? <a href="#">Hubungi Staf
                                    Admin.</a></small>
                        </p>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password svg.bi.bi-eye').addClass( "d-none" );
                    $('#show_hide_password svg.bi.bi-eye-slash').removeClass( "d-none" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password svg.bi.bi-eye-slash').addClass( "d-none" );
                    $('#show_hide_password svg.bi.bi-eye').removeClass( "d-none" );
                }
            });
        });
    </script>
</body>

</html>