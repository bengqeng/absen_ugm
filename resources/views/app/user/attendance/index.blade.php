@extends('app.user.shared.main')

@section('content')
<!-- table absensi -->
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="fs-4">
                Riwayat Presensi
            </h1>
        </div>
        <div class="col-12 mb-4">
            <h2 class="fs-6">
                Filter Presensi
            </h2>

            <form action="{{ route('staff.attendance.index') }}" method="get">
                @csrf
                <div class="form-floating mb-2">
                    <select class="form-select" required id="floatingSelect" name="month" aria-label="Floating label select example">
                        <option value="">-- Silahkan Pilih Bulan --</option>
                        @forelse($months as $month)
                        <option {{ Request::input('month') == $month->format('m') ? 'selected' : '' }} value="{{ $month->format('m') }}">{{ $month->format('F') }}</option>
                        @empty
                        <option>No Data Found</option>
                        @endforelse
                    </select>
                    <label for="floatingSelect">Pilih Bulan</label>
                </div>
                <div class="form-floating mb-2">
                    <select class="form-select" required="" id="floatingSelect" name="year" aria-label="Floating label select example">
                        <option>-- Silahkan Pilih Tahun --</option>
                        @forelse ($years as $year)
                        <option {{ Request::input('year') == $year->format('Y') ? 'selected' : '' }} value="{{ $year->format('Y') }}">{{ $year->format('Y') }}</option>
                        @empty
                        <option value="">No Data Found</option>
                        @endforelse
                    </select>
                    <label for="floatingSelect">Pilih Tahun</label>
                </div>
                <button class="btn btn-success btn-tropmed float-end px-5" type="submit">Filter</button>
            </form>
        </div>
        <div class="col-12">
            <h2 class="fs-6">
                Presensi
            </h2>
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">Check In</th>
                        <th class="fw-semibold col-4">Check Out</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($attendances as $attendance)
                    <tr {{ $attendance['date']->isWeekend() ? "style=background:#FF5651": '' }}>
                        <td>{{ $attendance['date']->format('Y/m/d') }}</td>
                        @if (isset($attendance['attendance']))
                            <td>{{ $attendance['attendance']['check_in'] }}</td>
                            <td>{{ isset($attendance['attendance']['check_out']) ? $attendance['attendance']['check_out'] : '-' }}</td>
                            <td>
                                <button class="btn text-success p-1 m-0" data-bs-toggle="modal"
                                    data-bs-target="#deatilPresensiModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </button>
                            </td>
                        @else
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <button class="btn text-success p-1 m-0" data-bs-toggle="modal"
                                    data-bs-target="#deatilPresensiModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </button>
                            </td>
                        @endif

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection