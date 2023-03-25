@extends('app.user.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Form Peminjaman <br>
                @if ($asset->canBorrowed())
                <h6 class="badge bg-success">{{ $asset->status->ready }} asset ready</h6>
                @else
                <span class="badge bg-danger">not ready</span>
                @endif
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <form action="{{ route('staff.borrow_asset.store', ['user' => $user->id, 'asset' => $asset->id]) }}"
                method="POST">
                @csrf
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingItemName" placeholder="Nama Aset"
                            value="{{ $asset->name }}" disabled>
                        <label for="floatingItemName">Nama Aset</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" disabled class="form-control" id="floatingItemName"
                            placeholder="Nama Peminjam" value="{{ $user->name }}" disabled>
                        <label for="floatingItemName">Nama Peminjam</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" disabled class="form-control disabled" id="floatingItemType"
                            placeholder="Project Name" value="{{ $user->project->name ?? ''}}">
                        <label for="floatingItemType">Nama Project</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" required name="date_borrow" class="form-control" id="floatingdateBorrow"
                            value="0">
                        <label for="floatingdateBorrow">Tanggal Pinjam</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" pattern="[0-9]*" required name="date_return" class="form-control bg-warning"
                            id="floatingdateReturn" value="0">
                        <label for="floatingdateReturn">Tanggal Pengembalian</label>
                    </div>
                    <div class="form-floating mb-2 shadow">
                        <textarea class="form-control" name="description_borrow" placeholder="Deskripsi:"
                            id="floatingDescription" style="height: 200px"></textarea>
                        <label for="floatingDescription">Deskripsi:</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('staff.borrow_asset.index', ['user', $user->id]) }}">Kembali</a>
                        @if ($asset->canBorrowed())
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Pinjam</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection