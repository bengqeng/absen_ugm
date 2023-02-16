@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Tambah Project Baru
            </h1>
        </div>
        <div class="col-12">
            <form action="{{ route('admin.project.store') }}" method="POST">
                @csrf
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="name" id="floatingItemName"
                            placeholder="Nama Project">
                        <label for="floatingItemName">Nama Project</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="year" class="form-select" id="floatingProject" placeholder="Project">
                            <option value="">-- Silahkan Pilih Tahun --</option>
                            @forelse ($years as $year)
                            <option value="{{ $year->format('Y') }}">{{ $year->format('Y') }}</option>
                            @empty
                            <option value="">No Data Found</option>
                            @endforelse
                        </select>
                        <label for="floatingProject">Tahun Project</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" href="{{ route('admin.project.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection