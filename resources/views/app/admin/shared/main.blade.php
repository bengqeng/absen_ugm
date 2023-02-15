<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <title>Dashboard | Tropmed</title>
</head>

<body class="bg-light">
    @include('app.admin.shared.header')

    <!-- navbar -->
    @include('app.admin.shared.navbar')

    <!-- content -->
    <section>
        @yield('content')
    </section>

    <!-- footer -->
    @include('app.admin.shared.footer')

    @include('app.admin.shared.modal')
</body>

</html>
