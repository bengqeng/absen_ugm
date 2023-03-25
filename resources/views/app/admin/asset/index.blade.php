@extends('app.admin.shared.main')

@section('content')
<!-- table absensi -->
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-between">
            <h1 class="fs-4">
                Data Aset
            </h1>
            <a class="btn btn-sm btn-primary float-end" type="submit" href="{{ route('admin.asset.create') }}">Tambah
                Aset +
            </a>
        </div>
        <div class="col-12 mb-4">
            <h2 class="fs-6">
                Filter Aset
            </h2>
            <form action="{{ route('admin.asset.index') }}" method="GET">
                @csrf
                <div class="form-floating mb-2">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control disabled" id="floatingItemType"
                            placeholder="Jenis Aset" value="{{ Request::get('name') }}">
                        <label for="floatingItemType">Nama Asset</label>
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <div class="form-floating mb-3">
                        <input type="text" name="type" class="form-control disabled" id="floatingItemType"
                            placeholder="Jenis Aset" value="{{ Request::get('type') }}">
                        <label for="floatingItemType">Jenis Aset (cth. Kamera, Laptop, dll)</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <select name="asset_category_id" class="form-select" id="floatingCategory" placeholder="Kategori">
                        <option value="">-- Silahkan Pilih Kategori Asset --</option>
                        @forelse ($assetCategories as $assetCategory)
                        <option {{ $assetCategory->id == Request::get('asset_category_id') ? 'selected' : '' }}
                            value="{{ $assetCategory->id }}">{{ $assetCategory->name }}</option>
                        @empty
                        <option value="">No Data Found</option>
                        @endforelse
                    </select>
                    <label for="floatingCategory">Kategori Aset</label>
                </div>
                <div class="d-grid gap-2 d-flex justify-content-end">
                    <button class="btn btn-success btn-tropmed float-end px-5" type="submit">Filter</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="d-grid gap-2 d-flex justify-content-between mb-3">
                <h2 class="fs-6 align-item-center">
                    Data
                </h2>
                <button class="btn btn-success btn-tropmed">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg>
                </button>
            </div>
            <table class="table table-hover bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-1">No</th>
                        <th class="fw-semibold col-4">Nama Aset</th>
                        <th class="fw-semibold col-4">Kategori</th>
                        <th class="fw-semibold col-4">Jenis</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->asset_category->name }}</td>
                        <td>{{ $asset->type }}</td>
                        <td>
                            <a class="btn text-success p-1 m-0" href="{{ route('admin.asset.edit', $asset->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection