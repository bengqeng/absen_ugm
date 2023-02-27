@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Edit Kategori
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <form action="{{ route('admin.asset_category.update', $assetCategory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" required name="name" class="form-control" id="floatingCategoryName"
                            placeholder="Nama Kategori" value="{{ $assetCategory->name }}">
                        <label for="floatingCategoryName">Nama Kategori</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('admin.asset_category.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection