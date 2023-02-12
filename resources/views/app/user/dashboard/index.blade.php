@extends('app.user.shared.main')

@section('content')
    <!-- button check in check out -->
    <div class="container">
        <div class="row">
            <div class="col my-4">
                <div class="d-grid gap-2 d-flex justify-content-center">
                    <a class="btn btn-lg btn-outline-success px-4" href="{{ route('staff.checkin.index') }}">Check In</a>
                    <a class="btn btn-lg btn-success btn-tropmed px-4" href="{{ route('staff.checkout.index') }}">Check
                        Out</a>
                </div>
            </div>
        </div>
    </div>

    <!-- table absensi -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-6">
                    Absensi Terakhir
                </h2>
            </div>
            <div class="col-12">
                <table class="table bg-white shadow-sm rounded">
                    <thead>
                        <tr class="text-center">
                            <th class="fw-semibold col-4">Tanggal</th>
                            <th class="fw-semibold col-4">Tipe</th>
                            <th class="fw-semibold col-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>24/01/2023</td>
                            <td>WFO</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>WFO</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>WFO</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>WFO</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>WFO</td>
                            <td>Selesai</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- table riwayat peminjaman alat -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-6">
                    Riwayat Peminjaman Alat
                </h2>
            </div>
            <div class="col-12">
                <table class="table bg-white shadow-sm rounded">
                    <thead>
                        <tr class="text-center">
                            <th class="fw-semibold col-4">Tanggal</th>
                            <th class="fw-semibold col-4">Alat</th>
                            <th class="fw-semibold col-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>24/01/2023</td>
                            <td>Kamera</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>Laptop</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>Speaker</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>Buku Tactic</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>24/01/2023</td>
                            <td>Console game</td>
                            <td>Selesai</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>
@endsection
