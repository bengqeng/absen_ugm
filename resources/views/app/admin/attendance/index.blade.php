@extends('app.admin.shared.main')

@section('content')
<!-- table absensi -->
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="fs-4">
                Data Presensi
            </h1>
        </div>
        <div class="col-12 mb-4">
            <h2 class="fs-6 fw-bolder">
                Filter Presensi
            </h2>
            <form action="{{ route('admin.attendance.index') }}" method="get">
                @csrf
                <div class="mb-2">
                    <label for="floatingSelect">Pilih Staf</label>
                    <select class="form-select" required="true" name="user_id" id="floatingSelectStaff"
                        aria-label="Floating label select example">
                        <option value="">-- Silahkan Pilih Staf --</option>

                        @forelse($users as $user)
                        <option {{ Request::input('user_id')==$user->id ? 'selected' : '' }} value="{{ $user->id }}">{{
                            $user->name }}</option>
                        @empty
                        <option value="">No Data Found</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-floating mb-2">
                    <select class="form-select" required="true" id="floatingSelectmonth" name="month"
                        aria-label="Floating label select example">
                        <option value="">-- Silahkan Pilih Bulan --</option>
                        @forelse($months as $month)
                        <option {{ Request::input('month')==$month->format('m') ? 'selected' : '' }} value="{{
                            $month->format('m') }}">{{ $month->format('F') }}</option>
                        @empty
                        <option>No Data Found</option>
                        @endforelse
                    </select>
                    <label for="floatingSelect">Pilih Bulan</label>
                </div>
                <div class="form-floating mb-2">
                    <select class="form-select" required='true' id="floatingSelectyear" name="year"
                        aria-label="Floating label select example">
                        <option value="">-- Silahkan Pilih Tahun --</option>
                        @forelse ($years as $year)
                        <option {{ Request::input('year')==$year->format('Y') ? 'selected' : '' }} value="{{
                            $year->format('Y') }}">{{ $year->format('Y') }}</option>
                        @empty
                        <option value="">No Data Found</option>
                        @endforelse
                    </select>
                    <label for="floatingSelect">Pilih Tahun</label>
                </div>
                <button class="btn btn-success btn-tropmed float-end px-5" type="submit" value="filter"
                    name="filter">Tampilkan</button>
                <button class="btn btn-success btn-tropmed" type="submit" name="print" value="print">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="col-12">
            <div class="d-grid gap-2 d-flex justify-content-between mb-3">
                <h2 class="fs-6 align-item-center">
                    {{-- Presensi: <span class="text-tropmed fw-bold">Reza Velayani</span> --}}
                </h2>

            </div>

            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">In</th>
                        <th class="fw-semibold col-4">Out</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($attendances as $attendance)
                    <tr class="{{ $attendance['isWeekend'] ? 'bg-danger text-light' : '' }}">
                        <td>{{ $attendance['date']->format('d') }}</td>
                        @if (isset($attendance['attendance']))
                        <td>{{$attendance['attendance']['hours_checkin']}}</td>
                        <td>{{ isset($attendance['attendance']['check_out']) ?
                            $attendance['attendance']['hours_checkout']:
                            '-' }}</td>
                        <td>
                            <button class="btn btn-tropmed btn-primary py-0"
                                onclick="attendanceDetails({{$attendance['attendance']['id']}})">
                                Detail
                            </button>
                        </td>
                        @else
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        @endif

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Data Tidak Ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
            $('#floatingSelectStaff').select2();
        });
</script>
@endpush
@endsection