@extends('app.admin.shared.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 mb-3 text-center">
                <h1 class="fs-4">
                    Edit Project
                </h1>
            </div>
            <div class="col-12">
                <form action="">
                    <div class="mx-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingItemName" placeholder="Nama Barang">
                            <label for="floatingItemName">Nama Project</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="" class="form-select" id="floatingProject" placeholder="Project">
                                <option value="1" selected>Tahun</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                            </select>
                            <label for="floatingProject">Project</label>
                        </div>
                        <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                            <button class="btn btn-outline-success px-4" type="button">Batal</button>
                            <button class="btn btn-success btn-tropmed px-4" type="button">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
