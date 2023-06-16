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

<body class="bg-white">

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

    @stack('scripts')
</body>

</html>