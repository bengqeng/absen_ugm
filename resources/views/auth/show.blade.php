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
                        <div class="form-floating">
                            <input name="password" type="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
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
</body>

</html>