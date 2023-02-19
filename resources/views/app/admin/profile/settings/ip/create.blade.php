@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Tambah IP Baru
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <!-- Nanti ta pasangin input mask -->
            <form action="{{ route('admin.settings.ip.store') }}" method="POST">
                @csrf
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" required name="ip" id="ipv4" class="form-control" id="floatingIteIp"
                            placeholder="Nama Barang">
                        <label for="floatingIteIp">IP Adress</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="name" type="text" class="form-control" id="floatingItemName"
                            placeholder="Nama Ip">
                        <label for="floatingItemName">Nama IP</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('admin.settings.ip.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection