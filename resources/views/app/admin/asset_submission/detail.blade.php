@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Detail Peminjaman Aset <br>
                <h6><span class="badge bg-secondary">{{ $assetSubmission->status }}</span></h6>
            </h1>
        </div>
        <div class="col-12">
            <div class="mx-2">
                <table class="table bg-white shadow-sm rounded p-2">
                    <tbody>
                        <tr>
                            <th class="align-top fw-semibold col-2">Aset</th>
                            <td><a href="{{ route('admin.asset.edit', $assetSubmission->asset->id) }}">{{
                                    $assetSubmission->asset->name }}</a></td>
                        </tr>
                        <tr>
                            <th class="align-top fw-semibold text-nowrap col-2">Nama Peminjam</th>
                            <td><a href="{{ route('admin.user.edit', $assetSubmission->owner->id) }}">{{
                                    $assetSubmission->owner->name }}</a></td>
                        </tr>
                        <tr>
                            <th class="align-top fw-semibold text-nowrap col-2">Tanggal Pinjam</th>
                            <td>{{ $assetSubmission->date_borrow }}</td>
                        </tr>
                        <tr>
                            <th class="align-top fw-semibold col-2">Tanggal Kembali</th>
                            <td>{{ $assetSubmission->date_return}}</td>
                        </tr>
                        <tr>
                            <th class="align-top fw-semibold col-2">Project</th>
                            <td>{{ $assetSubmission->owner->project->name ?? 'User tidak memiliki project' }}</td>
                        </tr>
                        <tr>
                            <th class="align-top fw-semibold col-2">Deskripsi</th>
                            <td>{{ $assetSubmission->description_borrow }}</td>
                        </tr>
                        <tr>
                            <th class="align-top fw-semibold col-2">Foto Pengambilan</th>
                            <td>
                                @if (isset($assetSubmission->photo_taking_asset))
                                <img src=" {!! $assetSubmission->photo_taking_asset !!}" class="img-thumbnail"
                                    height="480" width="640">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="align-top fw-semibold col-2">Foto Pengembalian</th>
                            <td>
                                @if (isset($assetSubmission->photo_returning_asset))
                                <img src=" {!! $assetSubmission->photo_returning_asset !!}" class="img-thumbnail"
                                    height="480" width="640">
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mx-2">
                @include('app.admin.asset_submission.button_status', ['assetSubmission' => $assetSubmission])
            </div>
        </div>
    </div>
</div>
@endsection