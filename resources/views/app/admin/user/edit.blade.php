@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Sunting Karyawan
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <form action="">
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingItemName" name="name"
                            placeholder="Nama Lengkap">
                        <label for="floatingItemName">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control disabled" id="floatingItemType" placeholder="Jenis Aset">
                        <label for="floatingItemType">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control disabled" id="floatingItemType"
                            placeholder="Jenis Aset">
                        <label for="floatingItemType">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="" class="form-select" id="floatingProject" placeholder="Project">
                            <option value="1" selected>Kategori 1</option>
                            <option value="2">Kategori 2</option>
                            <option value="3">Kategori 3</option>
                        </select>
                        <label for="floatingProject">Project</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingDate" placeholder="Password"
                            value="*******">
                        <label for="floatingDate">password</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <button class="btn btn-outline-success px-4" type="button">Batal</button>
                        <button class="btn btn-success btn-tropmed px-4" type="button">Perbarui</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection