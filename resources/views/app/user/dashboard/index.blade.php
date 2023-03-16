@extends('app.user.shared.main')

@section('content')
<!-- button check in check out -->
<div class="container">
    <div class="row">
        <div class="col my-4">
            <div class="d-grid gap-2 d-flex justify-content-center">
                <a class="btn btn-lg btn-outline-success px-4" @if (!$isAlreadyAbsentCheckIn)
                    href="{{ route('staff.checkin.create') }}" @else style="pointer-events: none;" @endif>Check
                    In</a>
                <a class="btn btn-lg btn-success btn-tropmed px-4" href="{{ route('staff.checkout.create') }}">Check
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
                        <th class="fw-semibold col-4">Check In</th>
                        <th class="fw-semibold col-4">Check Out</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->created_at }}</td>
                        <td>{{ isset($attendance->check_in) ? $attendance->hours_checkin : '-' }}</td>
                        <td>{{ isset($attendance->check_out) ? $attendance->hours_checkout : '-' }}</td>
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
                    @forelse ($assetSubmission as $as)
                    <tr>
                        <td>{{ $as->date_borrow }}</td>
                        <td>{{ $as->asset->name }}</td>
                        <td>{{ $as->status }}</td>
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

<script>
    $(document).ready(function() {
            if (!@json($isAlreadyAbsentCheckIn)) {
                $('#myModal').modal('show');
            }
        });
</script>
@endsection