@extends('app.admin.shared.main')

@section('content')
<!-- table absensi -->
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="fs-4">
                Data Pengajuan Pengembalian
            </h1>
        </div>
        <div class="col-12 mb-4">
            <h2 class="fs-6 fw-semibold">
                Filter Pengembalian
            </h2>
            <form action="" method="GET">
                @csrf
                <select name="search_category" class="form-select mb-3" id="search_category" placeholder="Kategori">
                    <option @if (Request::get('search_category')=='user_name' ) selected="selected" @endif
                        value="user_name">Nama
                        Staf</option>
                    <option @if (Request::get('search_category')=='asset_name' ) selected="selected" @endif
                        value="asset_name">
                        Nama Aset</option>
                    <option @if (Request::get('search_category')=='date' ) selected="selected" @endif value="date">
                        Tanggal
                        Peminjaman</option>
                </select>
                <input type="text" name="search" class="form-control mb-3" id="search" placeholder=""
                    value="{{ Request::get('search') }}">
                <div class="d-grid gap-2 d-flex justify-content-end">
                    <a class="btn btn-sm btn-secondary float-end px-5"
                        href="{{route('admin.asset_action.index_return')}}" type="button">
                        Reset
                    </a>
                    <button class="btn btn-sm btn-success btn-tropmed float-end px-5" type="submit">
                        Filter
                    </button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="d-grid gap-2 d-flex justify-content-between mb-3">
                <h2 class="fs-6 fw-semibold align-self-center mb-0">
                    List Peminjam
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
                        <th class="fw-semibold col-4">Tanggal</th>
                        <th class="fw-semibold col-4">Staf</th>
                        <th class="fw-semibold col-4">Aset</th>
                        <th class="fw-semibold col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($returningAssets as $asset)
                    <tr>
                        <td>{{ $asset->date_borrow }}</td>
                        <td>{{ $asset->owner->name }}</td>
                        <td>{{ $asset->asset->name }}</td>
                        <td>
                            <a class="btn text-success p-1 m-0"
                                href="{{ route('admin.asset_submission.show', $asset->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
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

<script>
    // JavaScript code here
    const inputTypeSelect = document.getElementById('search_category');
    const textInput = document.getElementById('search');
    
    inputTypeSelect.addEventListener('change', function() {
    const selectedOption = inputTypeSelect.value;
    
    if (selectedOption === 'date') {
    textInput.type = 'date';
    } else {
    textInput.type = 'text';
    }
    });

    // Check initial value on document ready
    if (inputTypeSelect.value === 'date') {
    textInput.type = 'date';
    } else {
    textInput.type = 'text';
    }
</script>
@endsection