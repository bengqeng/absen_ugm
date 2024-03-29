@extends('app.user.shared.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col my-4">
            <div class="d-grid gap-2 d-flex justify-content-center">
                <a href="{{ route('staff.borrow_asset.index', ['user' => auth()->user()->id]) }}"
                    class="btn btn-succes btn-tropmed py-3 px-4" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-handbag" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z" />
                    </svg><br>
                    Ajukan Peminjaman Barang
                </a>
                {{-- <a class="btn btn-danger py-3 px-4" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                        <path fill-rule="evenodd"
                            d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg><br>
                    Pengembalian
                </a> --}}
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-6">
                Status Pengajuan Peminjaman
            </h2>
        </div>
        @forelse ($onProgressSubmissions as $onProgress)
        <div class="col-sm-6 mb-3">
            <div class="card border-0 shadow-sm p-4">
                <div class="row">
                    <div class="col-8">
                        <h3 class="fs-3 m-0">{{ $onProgress->asset->name }}</h3>
                        <div class="description-title mb-2">
                            <span>{{ $onProgress->asset->type }} </span>-<span class="text-success"> {{
                                $onProgress->asset->asset_category->name }}</span>
                        </div>
                        <div class="loan-date">
                            <span>Pinjam : {{ $onProgress->date_borrow }}</span></br>
                            <span>Kembali : {{ $onProgress->date_return }}</span>
                        </div>
                    </div>
                    <div class="col-4 d-flex flex-column text-end">
                        <h3
                            class="fs-5 m-0 text-{{ $onProgress->status == 'pending' ? 'warning' : ($onProgress->status == 'approved' ? 'primary' : 'secondary') }}">
                            {{ $onProgress->status }}
                        </h3>
                        <a href="{{ route('staff.asset_submission.show', ['user' => auth()->user()->id, 'asset_submission' => $onProgress->id]) }}"
                            class="btn btn-sm btn-outline-secondary mt-auto">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-sm-6 mb-3">

        </div>
        @endforelse
        <div class="col mb-3">
            <a href="{{route('admin.asset_submission.on_progress_submission_index')}}"
                class="btn btn-sm btn-warning float-end">Lebih
                Lengkap</a>
        </div>
    </div>
</div>

<div class="container">
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
                        <th class="fw-semibold col-2">Status</th>
                        <th class="fw-semibold col-1">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($finishedSubmissions as $finishedSubmission)
                    <tr>
                        <td>{{ $finishedSubmission->date_borrow }}</td>
                        <td>{{ $finishedSubmission->asset->name }}</td>
                        <td>{{ $finishedSubmission->status }}</td>
                        <td> <a href="{{ route('staff.asset_submission.show', ['user' => auth()->user()->id, 'asset_submission' => $finishedSubmission->id]) }}"
                                class="btn btn-sm btn-outline-secondary mt-auto">Detail</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection