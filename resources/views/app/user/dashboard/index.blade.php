@extends('app.user.shared.main')

@section('content')
<div class="container-fluid bg-profile mb-5" style="border-radius: 0 0 4em 4em; padding: 1em 1em 1em 1em;">

    <div class="container-fluid bg-white" style="border-radius: 3em; padding: 1em;">
        <div class="image-header mb-4">
            <img src="{{ asset('images/logo_tropmed.png') }}" class="mx-auto d-block" alt="...">
        </div>
        <table class="w-100 mt-5">
            <tbody>
                <tr>
                    <td>Tanggal</td>
                    <td class="float-end fw-semibold">{{now()->format('d M Y')}}</td>
                </tr>
                <tr>
                    <td>Absen Masuk</td>
                    <td class="float-end fw-semibold">{{$recent_hours_checkin}}</td>
                </tr>
                <tr>
                    <td>Absen Pulang</td>
                    <td class="float-end fw-semibold">{{$recent_hours_checkout}}</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col mt-4">
                <div class="d-grid gap-2 d-flex justify-content-center">
                    @if (!$isAlreadyAbsentCheckIn)
                    <a class="btn btn-lg text-light px-4 rounded-3 border border-2"
                        style="background-image: linear-gradient( 109.6deg,  rgba(61,131,97,1) 11.2%, rgba(28,103,88,1) 91.1% );"
                        href="{{ route('staff.checkin.create') }}"><span style="">Check
                            In</span></a>
                    @else
                    <a class="btn btn-lg btn-outline-default px-4 rounded-3 border border-2 disabled"
                        style="pointer-events: none;"><span style="">Check
                            In</span></a>
                    @endif

                    @if (!$isAlreadyAbsentCheckOut)
                    <a class="btn btn-lg text-light px-4 rounded-3 border border-2"
                        style="background-image: linear-gradient( 109.6deg,  rgba(61,131,97,1) 11.2%, rgba(28,103,88,1) 91.1% );"
                        href="{{ route('staff.checkout.create') }}"><span class="" style="">Check
                            Out</span></a>
                    @else
                    <a class="btn btn-lg btn-outline-default px-4 rounded-3 border border-2 disabled"
                        style="pointer-events: none;"><span style="">Check
                            Out</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <!-- table absensi -->
        <div class="col-sm-6 col-12 mb-4">
            <div class="row">
                <div class="col-6">
                    <h2 class="fs-4 fw-bold">
                        Absensi Terakhir
                    </h2>
                </div>
                <div class="col-6">
                    <a class="fs-6 text-decoration-none fw-bold text-success text-tropmed float-end"
                        href="{{route('staff.attendance.index')}}">Lihat
                        Semua</a>
                </div>
                <div class="col-12">
                    @forelse ($attendances as $attendance)
                    <div class="col-sm-12 mb-2">
                        <div class="card border-0 text-light p-4" onclick="attendanceDetails({{$attendance->id}})"
                            style='border-radius: 0.5rem; background-color:rgb(68, 144, 129)'>
                            <div class="row">
                                <div class="col-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                        class="bi bi-calendar-check d-inline-block" viewBox="0 0 25 25">
                                        <path
                                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                    <h3 class="fs-4 m-0 fw-bold d-inline-block">{{ $attendance->date_attendance }}</h3>
                                </div>
                                <div class="col-4 d-flex flex-column">
                                    <div class="loan-date small">
                                        <span>In : {{ isset($attendance->check_in) ?
                                            $attendance->hours_checkin : '-'
                                            }}</span><br>
                                        <span>Out : {{ isset($attendance->check_out) ?
                                            $attendance->hours_checkout : '-'
                                            }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-sm-6 mb-3">
                        <div class="card border-0 text-light p-4" style='background-color: #0b5d81;
                                background-image: linear-gradient(0deg, #0b5d81 0%, #359582 100%);'>
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="fs-4 m-0 fw-bold">Data Not Found</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- table riwayat peminjaman alat -->
        <div class="col-sm-6 col-12">
            <div class="row">
                <div class="col-6">
                    <h2 class="fs-4 fw-bold">
                        Peminjaman Alat
                    </h2>
                </div>
                <div class="col-6">
                    <a class="fs-6 text-decoration-none fw-bold text-success text-tropmed float-end"
                        href="{{route('staff.asset_submission.index',['user'=>auth()->user()->id])}}">Lihat
                        Semua</a>
                </div>
                <div class="col-12">
                    @forelse ($assetSubmission as $item)
                    <div class="col-sm-12 mb-2">
                        <div class="card border border-3 text-dark p-4"
                            style='border-radius: 0.5rem; border-color:rgb(68, 144, 129) !important;'>
                            <div class="row">
                                <div class="col-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                        class="bi bi-motherboard" viewBox="0 0 25 25">
                                        <path
                                            d="M11.5 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5Zm2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5Zm-10 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM5 3a1 1 0 0 0-1 1h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3Zm0 1h3v3H5V4Zm6.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2Z" />
                                        <path
                                            d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm1 11a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v11Z" />
                                    </svg>
                                    <h3 class="fs-4 m-0 fw-bold d-inline-block">{{ $item->date_borrow }}</h3>
                                </div>
                                <div class="col-4 d-flex flex-column">
                                    <div class="loan-date small">
                                        <span>Alat : {{ $item->asset->name }}</span><br>
                                        <span>Status : {{ $item->status }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-sm-6 mb-3">
                        <div class="card border-0 text-light p-4" style='background-color: #0b5d81;
                                            background-image: linear-gradient(0deg, #0b5d81 0%, #359582 100%);'>
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="fs-4 m-0 fw-bold">Data Not Found</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
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
                        <b>Anda telah terhubung</b><br>
                        dengan Koneksi Internet<br>
                        Pusat Kedokteran Tropis FK-KMK UGM
                    </p>
                    @else
                    <p class="alert alert-danger">
                        <b>Anda tidak terhubung</b><br>
                        dengan Koneksi Internet<br>
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
                utc = new Date(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate(),
                    date.getHours(),
                    date.getMinutes(),
                    date.getSeconds()
                );
                
                document.getElementById('time').innerHTML = utc.toLocaleTimeString('en-GB');
            }
            
            setInterval(showTime, 1000);
</script>
@endsection