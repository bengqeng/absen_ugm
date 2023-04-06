@extends('app.user.shared.main')

@section('content')
<!-- button check in check out -->
<div class="container">
    <div class="row">
        <div class="col my-4">
            <div class="d-grid gap-2 d-flex justify-content-center">
                @if (!$isAlreadyAbsentCheckIn)
                <a class="btn btn-lg btn-outline-success px-4" href="{{ route('staff.checkin.create') }}">Check
                    In</a>
                @else
                <a class="btn btn-lg btn-outline-default px-4 disabled" style="pointer-events: none;">Checked
                    In<br><small>{{$recent_hours_checkin}}</small></a>
                @endif

                @if (!$isAlreadyAbsentCheckOut)
                <a class="btn btn-lg btn-success btn-tropmed px-4" href="{{ route('staff.checkout.create') }}">Check
                    Out</a>
                @else
                <a class="btn btn-lg btn-outline-default px-4 disabled" style="pointer-events: none;">Checked
                    Out<br><small>{{$recent_hours_checkout}}</small></a>
                @endif
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
                        <td>{{ $attendance->date_attendance }}</td>
                        <td>{{ isset($attendance->check_in) ? $attendance->hours_checkin : '-' }}</td>
                        <td>{{ isset($attendance->check_out) ? $attendance->hours_checkout : '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Data Found</td>
                    </tr>
                    @endforelse

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-center"><a class="text-decoration-none text-tropmed"
                                href="{{route('staff.attendance.index')}}">Lihat
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
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-center"><a class="text-decoration-none text-tropmed"
                                href="{{route('staff.asset_submission.index',['user'=>auth()->user()->id])}}">Lihat
                                Semua</a></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<section>
    <div class="modal" id="myModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    @if ($statusIp === 'office')
                    <p class="alert alert-success">
                        <b>Anda telah terhubung</b> dengan<br>
                        Jaringan Internet<br>
                        Pusat Kedokteran Tropis FK-KMK UGM
                    </p>
                    @else
                    <p class="alert alert-danger">
                        <b>Anda tidak terhubung</b> dengan<br>
                        Jaringan Internet<br>
                        Pusat Kedokteran Tropis FK-KMK UGM
                    </p>
                    <button class="btn btn-small btn-secondary mb-2" onclick='window.location.reload(true);'><small>Muat
                            Ulang Halaman</small></button>
                    @endif

                    <p class="fw-bold lh-lg">
                        {{now()->format(' j F Y')}}, <span id="time"></span>
                    </p>
                    <span class="text-success">
                        <svg style="filter: drop-shadow(4px 4px 1px rgb(0 0 0 / 0.4));"
                            xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-wifi" viewBox="0 0 16 16">
                            <path
                                d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z" />
                            <path
                                d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z" />
                        </svg>
                    </span>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-4">
                    <a type="button" class="btn btn-lg btn-success btn-tropmed w-100"
                        href="{{ route('staff.checkin.create') }}">Check In</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
            if (!@json($isAlreadyAbsentCheckIn)) {
                $('#myModal').modal('show');
            }
        });
</script>
<script>
    function showTime() {
                var date = new Date(),
                utc = new Date(Date.UTC(
                date.getFullYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours(),
                date.getMinutes(),
                date.getSeconds()
                ));
                
                document.getElementById('time').innerHTML = utc.toLocaleTimeString('en-GB');
            }
            
            setInterval(showTime, 1000);
</script>
@endsection