@extends('app.admin.shared.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col my-4">
                <div class="d-grid gap-2 d-flex justify-content-center">
                    <a href="{{ route('admin.asset.create') }}" class="btn btn-succes btn-tropmed py-3 px-4" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                        </svg><br>
                        Input Aset Baru
                    </a>
                    <a class="btn btn-danger py-3 px-4" type="button" href="{{ route('admin.asset.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-folder2-open" viewBox="0 0 16 16">
                            <path
                                d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z" />
                        </svg><br>
                        Data Aset
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- table peminjaman Aset -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-6">
                    Pengajuan Peminjaman Aset
                </h2>
            </div>
            <div class="col-12">
                <table class="table bg-white shadow-sm rounded">
                    <thead>
                        <tr class="text-center">
                            <th class="fw-semibold col-4">Tanggal Pinjam</th>
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
                                <button class="btn btn-success btn-tropmed" data-bs-toggle="modal"
                                    data-bs-target="#detailPengajuanModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                <button class="btn btn-success btn-tropmed" data-bs-toggle="modal"
                                    data-bs-target="#detailPengajuanModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                <button class="btn btn-success btn-tropmed" data-bs-toggle="modal"
                                    data-bs-target="#detailPengajuanModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                <button class="btn btn-success btn-tropmed" data-bs-toggle="modal"
                                    data-bs-target="#detailPengajuanModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                <button class="btn btn-success btn-tropmed" data-bs-toggle="modal"
                                    data-bs-target="#detailPengajuanModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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

    <!-- table riwayat peminjaman alat -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-6">
                    Pengajuan Pengembalian Aset
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
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
