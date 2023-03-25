@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Form Add Aset
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <form action="{{ route('admin.asset.update', $asset->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" required class="form-control" id="floatingItemName"
                            placeholder="Nama Barang" value="{{ $asset->name }}">
                        <label for="floatingItemName">Nama Aset</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="type" required class="form-control disabled" id="floatingItemType"
                            placeholder="Jenis Aset" value="{{ $asset->type }}">
                        <label for="floatingItemType">Jenis Aset (cth. Kamera, Laptop, dll)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="asset_category_id" required class="form-select" id="floatingCategory"
                            placeholder="Kategori">
                            <option value="">-- Silahkan Pilih Kategori Asset --</option>
                            @forelse ($assetCategories as $assetCategory)
                            <option {{ $asset->asset_category_id == $assetCategory->id ? 'selected' : '' }} value="{{
                                $assetCategory->id }}">{{ $assetCategory->name }}</option>
                            @empty
                            <option value="">No Data Found</option>
                            @endforelse
                        </select>
                        <label for="floatingCategory">Kategori Aset</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" required min="0" name="total_asset" class="form-control"
                            id="floatingtotalAsset" value="{{ $asset->status->total_asset }}">
                        <label for="floatingtotalAsset">Jumlah Total Aset</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" min="0" pattern="[0-9]*" required name="maintenance"
                            class="form-control bg-warning" id="floatingmaintenance"
                            value="{{ $asset->status->maintenance }}">
                        <label for="floatingmaintenance">Jumlah Total Aset Rusak (maintenance)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" disabled class="form-control" id="floatingtotalAsset"
                            value="{{ $asset->status->borrowed }}">
                        <label for="floatingtotalAsset">Asset Terpinjam</label>
                    </div>
                    <div class="form-floating mb-2 shadow">
                        <textarea class="form-control" name="description" placeholder="Deskripsi:"
                            id="floatingDescription" style="height: 200px">{{ $asset->description }}</textarea>
                        <label for="floatingDescription">Deskripsi:</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('admin.asset_submission.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection