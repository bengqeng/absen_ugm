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
    <link rel="stylesheet" href="style.css">
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

    <!-- divider footer -->
    <div class="b-example-divider"></div>
    <!-- end divider footer -->

    @include('app.admin.shared.modal')

    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>