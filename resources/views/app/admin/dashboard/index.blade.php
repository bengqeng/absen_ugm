@extends('app.admin.shared.main')

@section('content')
<!-- counting data -->
<div class="container mb-3">
    <div class="row">
        <div class="col-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="card-title mb-0 text-center" style="font-size: 0.8rem;">
                        Staf
                    </div>
                    <div class="text-center fw-bold" style="font-size: 2.5rem;">{{ $totalStaff }}</div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="card-title mb-0 text-center" style="font-size: 0.8rem;">
                        Aset
                    </div>
                    <div class="text-center fw-bold" style="font-size: 2.5rem;">{{ $totalAsset }}</div>
                </div>
            </div>
        </div>
        {{-- <div class="col-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="card-title mb-0 text-center" style="font-size: 0.8rem;">
                        Staf
                    </div>
                    <div class="text-center fw-bold" style="font-size: 2.5rem;">{{ $totalProject }}</div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

<!-- table absensi -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-6 fw-semibold">
                Absensi Terakhir
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-3">Tanggal</th>
                        <th class="fw-semibold col-3">Nama</th>
                        <th class="fw-semibold col-3">Check In</th>
                        <th class="fw-semibold col-3">Check Out</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($logAttendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date_attendance }}</td>
                        <td>{{ $attendance->user->name }}</td>
                        <td>{{ $attendance->hours_checkin }}</td>
                        <td>{{ $attendance->hours_checkout }}</td>
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
            <h2 class="fs-6 fw-semibold">
                Riwayat Peminjaman Asset
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-3">Tanggal</th>
                        <th class="fw-semibold col-3">Nama</th>
                        <th class="fw-semibold col-3">Aset</th>
                        <th class="fw-semibold col-2">Status</th>
                        <th class="fw-semibold col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($assetSubmission as $as)
                    <tr>
                        <td>{{ $as->date_borrow }}</td>
                        <td>{{ $as->owner->name }}</td>
                        <td>{{ $as->asset->name }}</td>
                        <td>{{ $as->status }}</td>
                        <td>
                            <a href="{{ route('admin.asset_submission.show', $as->id) }}" class="btn">
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
                        <td colspan="4">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection