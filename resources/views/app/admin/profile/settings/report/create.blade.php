@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Create Email Report
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <!-- Nanti ta pasangin input mask -->
            <form action="{{ route('admin.settings.report.store') }}" method="POST">
                @csrf
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" required name="text" class="form-control" id="floatingItemName"
                            placeholder="Nama Penerima">
                        <label for="floatingItemName">Nama Penerima</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="name" type="email" class="form-control" id="floatingItemEmail"
                            placeholder="Alamat Email">
                        <label for="floatingItemEmail">Alamat Email</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('admin.settings') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection