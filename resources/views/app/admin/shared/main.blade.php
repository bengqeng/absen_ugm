<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <title>Dashboard | Tropmed</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('app.admin.shared.header')

    <!-- navbar -->
    @include('app.admin.shared.navbar')

    <!-- content -->
    <section class="">
        @include('app.admin.shared.flash_message')
        @yield('content')
    </section>

    <!-- footer -->
    @include('app.admin.shared.footer')

    @include('app.admin.shared.modal')
    @stack('scripts')
</body>

</html>