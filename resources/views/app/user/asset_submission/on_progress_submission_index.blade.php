@extends('app.user.shared.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col my-4">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-6">
                Status Peminjaman Alat
            </h2>
        </div>
        <div class="col-12">
            <table class="table bg-white shadow-sm rounded">
                <thead>
                    <tr class="text-start">
                        <th class="fw-semibold col-8">Aset</th>
                        <th class="fw-semibold col-3">Status</th>
                        <th class="fw-semibold col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-start">
                    @forelse ($onProgressSubmissions as $item)
                    <tr>
                        <td>{{ $item->asset->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('staff.asset_submission.show', ['user' => auth()->user()->id, 'asset_submission' => $item->id]) }}"
                                class="btn btn-sm btn-outline-secondary mt-auto">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection