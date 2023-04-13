@extends('app.admin.shared.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col my-4">
            <div class="d-grid gap-2 d-flex justify-content-center">
                <a href="{{ route('admin.asset_category.create') }}" class="btn btn-succes btn-tropmed py-3 px-4"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                        <path
                            d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                    </svg><br>
                    Tambah category
                </a>
            </div>
        </div>
    </div>
</div>
<!-- table peminjaman Aset -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-6">
                Daftar Kategori
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr>
                        <th class="fw-semibold col">No</th>
                        <th class="fw-semibold col">Nama Kategori</th>
                        <th class="fw-semibold col text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.asset_category.edit', $category->id) }}" class="btn text-tropmed">
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
                        <td colspan="2">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection