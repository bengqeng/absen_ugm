@extends('app.admin.shared.main')

@section('content')
<!-- table absensi -->
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="fs-4">
                Data Pengajuan Peminjaman
            </h1>
        </div>
        <div class="col-12 mb-4">
            <h2 class="fs-6 fw-semibold">
                Filter Peminjaman
            </h2>
            <form action="" method="GET">
                @csrf
                <select name="asset_category_id" class="form-select mb-3" id="floatingCategory" placeholder="Kategori">
                    <option value="">Nama Staf</option>
                    <option value="">Nama Aset</option>
                    <option value="">Tanggal Peminjaman</option>
                </select>
                <input type="text" name="name" class="form-control mb-3" id="floatingItemType" placeholder=""
                    value="{{ Request::get('name') }}">
                <div class="d-grid gap-2 d-flex justify-content-end">
                    <button class="btn btn-sm btn-success btn-tropmed float-end px-5" type="submit">
                        Filter
                    </button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="d-grid gap-2 d-flex justify-content-between mb-3">
                <h2 class="fs-6 fw-semibold align-self-center mb-0">
                    List Peminjam
                </h2>
                <button class="btn btn-success btn-tropmed">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg>
                </button>
            </div>
            <table class="table table-hover bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">Staf</th>
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
                            <button class="btn btn-primary">
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
                            <button class="btn btn-primary">
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
                            <button class="btn btn-primary">
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
                            <button class="btn btn-primary">
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
                            <button class="btn btn-primary">
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