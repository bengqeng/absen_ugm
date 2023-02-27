@extends('app.admin.shared.main')

@section('content')
<!-- counting data -->
<div class="container mb-3">
    <div class="row">
        <div class="col-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="card-title mb-0 text-center" style="font-size: 0.8rem;">
                        Jumlah Staf
                    </div>
                    <div class="text-center fw-bold" style="font-size: 2.5rem;">{{ $totalStaff }}</div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="card-title mb-0 text-center" style="font-size: 0.8rem;">
                        Jumlah Asset
                    </div>
                    <div class="text-center fw-bold" style="font-size: 2.5rem;">{{ $totalAsset }}</div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="card-title mb-0 text-center" style="font-size: 0.8rem;">
                        Jumlah Staf
                    </div>
                    <div class="text-center fw-bold" style="font-size: 2.5rem;">{{ $totalProject }}</div>
                </div>
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
                        <th class="fw-semibold col-3">Tanggal Absen</th>
                        <th class="fw-semibold col-3">Nama Staf</th>
                        <th class="fw-semibold col-3">Check In</th>
                        <th class="fw-semibold col-3">Check Out</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($logAttendances as $attendance)
                    <tr>
                        <td>{{ $attendance->created_at }}</td>
                        <td>{{ $attendance->user->name }}</td>
                        <td>{{ $attendance->check_in }}</td>
                        <td>{{ $attendance->check_out }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No Data Found</td>
                    </tr>
                    @endforelse
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
                Pengajuan Pengembalian
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">Nama Staf</th>
                        <th class="fw-semibold col-4">Aset</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>24/01/2023</td>
                        <td>Reza Vel..</td>
                        <td>Kamera</td>
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>24/01/2023</td>
                        <td>Reza Vel..</td>
                        <td>Kamera</td>
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>24/01/2023</td>
                        <td>Reza Vel..</td>
                        <td>Kamera</td>
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>24/01/2023</td>
                        <td>Reza Vel..</td>
                        <td>Kamera</td>
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>24/01/2023</td>
                        <td>Reza Vel..</td>
                        <td>Kamera</td>
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection