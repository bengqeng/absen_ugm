@extends('app.admin.shared.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 mb-3 text-center">
                <h1 class="fs-4">
                    Form Input Aset
                </h1>
            </div>
            <div class="col-12">
                <form action="">
                    <div class="mx-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingItemName" placeholder="Nama Barang">
                            <label for="floatingItemName">Nama Aset</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control disabled" id="floatingItemType"
                                   placeholder="Jenis Aset">
                            <label for="floatingItemType">Jenis Aset (cth. Kamera, Laptop, dll)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="" class="form-select" id="floatingProject" placeholder="Project">
                                <option value="1" selected>Kategori 1</option>
                                <option value="2">Kategori 2</option>
                                <option value="3">Kategori 3</option>
                            </select>
                            <label for="floatingProject">Kategori Aset</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingDate" value="">
                            <label for="floatingDate">Tanggal Pembelian</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="" class="form-select" id="floatingCondition" placeholder="Kondisi Aset">
                                <option value="1" selected>Baru</option>
                                <option value="2">Bekas</option>
                            </select>
                            <label for="floatingCondition">Kondisi Aset</label>
                        </div>
                        <div class="form-floating mb-2 shadow">
                                <textarea class="form-control" name="description_check_in_wfh" placeholder="Deskripsi:"
                                          id="floatingTextarea2" style="height: 200px"></textarea>
                            <label for="floatingTextarea2">Deskripsi:</label>
                        </div>
                        <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                            <button class="btn btn-outline-success px-4" type="button">Batal</button>
                            <button class="btn btn-success btn-tropmed px-4" type="button">Tambahkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
