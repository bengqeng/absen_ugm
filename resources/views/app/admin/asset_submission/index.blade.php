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
            <h2 class="fs-6 fw-semibold">
                Pengajuan Peminjaman Aset
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr>
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">Staf</th>
                        <th class="fw-semibold col-4">Aset</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($borrowingAssets as $asset)
                    <tr>
                        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $asset->date_borrow)->format('d M') }}</td>
                        <td>{{ $firstName->execute($asset->owner->name) }}</td>
                        <td>{{ $asset->asset->name }}</td>
                        <td>
                            <a class="btn text-success p-1 m-0"
                                href="{{ route('admin.asset_submission.show', $asset->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
                <tr>
                    <th colspan="4" class="text-center"><a class="text-decoration-none text-tropmed"
                            href="{{route('admin.asset_action.index_borrow')}}">Lihat
                            Semua</a></th>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- table riwayat peminjaman alat -->
<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-6 fw-semibold">
                Pengajuan Pengembalian Aset
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr>
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">Staf</th>
                        <th class="fw-semibold col-4">Aset</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($returningAssets as $asset)
                    <tr>
                        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $asset->date_borrow)->format('d M') }}</td>
                        <td>{{ $firstName->execute($asset->owner->name) }}</td>
                        <td>{{ $asset->asset->name }}</td>
                        <td>
                            <a class="btn text-success p-1 m-0"
                                href="{{ route('admin.asset_submission.show', $asset->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-center"><a class="text-decoration-none text-tropmed"
                                href="{{route('admin.asset_action.index_return')}}">Lihat
                                Semua</a></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- table riwayat peminjaman alat -->
<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-6 fw-semibold">
                History Request Peminjaman Alat
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr>
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">Staf</th>
                        <th class="fw-semibold col-4">Aset</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($historyAssets as $asset)
                    <tr>
                        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $asset->date_borrow)->format('d M') }}</td>
                        <td>{{ $firstName->execute($asset->owner->name) }}</td>
                        <td>{{ $asset->asset->name }}</td>
                        <td>
                            <a class="btn text-success p-1 m-0"
                                href="{{ route('admin.asset_submission.show', $asset->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-center"><a class="text-decoration-none text-tropmed"
                                href="{{route('admin.asset_action.index_history')}}">Lihat
                                Semua</a></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection