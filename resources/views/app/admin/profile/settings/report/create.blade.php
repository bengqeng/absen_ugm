@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Buat Email Report
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <form action="{{ route('admin.settings.report.store') }}" method="POST">
                @csrf
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" required name="name" class="form-control" id="floatingItemName"
                            placeholder="Nama Penerima" value="{{old('name')}}">
                        <label for="floatingItemName">Nama Penerima</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="email" type="email" class="form-control" id="floatingItemEmail"
                            placeholder="Alamat Email" value="{{old('email')}}">
                        <label for="floatingItemEmail">Alamat Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" name="status" id="status">
                            <option value="primary">Primary</option>
                            <option value="cc">CC</option>
                        </select>
                        <label for="floatingItemStatus">Status</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('admin.settings.report.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection