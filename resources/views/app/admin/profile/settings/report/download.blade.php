@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Download Report Presensi
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <!-- Nanti ta pasangin input mask -->
            <form action="{{ route('admin.settings.report.store') }}" method="POST">
                @csrf
                <div class="mx-2">
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
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('admin.profile.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Download</button>
                    </div>
                </div>
            </form>
            <div class="container mt-3">
                <div class="bg-secondary p-2 rounded-2 text-light">
                    <p><b>Catatan:</b> Report presensi akan dikirimkan ke email yang telah diatur pada menu Lainnya >
                        Pengaturan >
                        Pengaturan Email Penerima</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection