@extends('app.user.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="fs-4">
                Peminjaman Aset
            </h1>
        </div>
        <div class="col-12 mb-4">
            <h2 class="fs-6">
                Filter Kategori
            </h2>
            <form action="{{ route('staff.borrow_asset.index', ['user' => auth()->user()->id]) }}" method="get">
                @csrf
                <div class="form-floating mb-2">
                    <select class="form-select" required name="asset_category_id" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option value="">Silahkan Pilih Kategori Asset</option>
                        @forelse ($categories as $category)
                        <option {{ Request::input('asset_category_id')==$category->id ? 'selected' : '' }} value="{{
                            $category->id }}">{{ $category->name }}</option>
                        @empty
                        <option value="">No Data Found</option>
                        @endforelse
                    </select>
                    <label for="floatingSelect">Pilih Kategori Aset</label>
                </div>
                <button class="btn btn-success btn-tropmed float-end px-5" type="submit">Filter</button>
            </form>
        </div>
        <div class="col-12">
            <h2 class="fs-6">
                Aset : {{ $selectedCategory->name ?? '-' }}
            </h2>
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-center">
                        <th class="fw-semibold col-1">No</th>
                        <th class="fw-semibold col-5">Nama</th>
                        <th class="fw-semibold col-5">Tipe</th>
                        <th class="fw-semibold col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->type }}</td>
                        <td>
                            @if ($asset->canBorrowed())
                            <a class="btn text-success p-1 m-0"
                                href="{{ route('staff.borrow_asset.create', ['user' => auth()->user()->id, 'assets' => $asset->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg>
                            </a>
                            @else
                            <h6><span class="badge bg-danger">Asset Kosong</span></h6>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection