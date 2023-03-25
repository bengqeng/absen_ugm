<div class="d-flex justify-content-end gap-1">
    @if (in_array($assetSubmission->status, ['pending']))
    <a href="{{ route('admin.asset_submission.approve', $assetSubmission->id) }}" class="btn btn-outline-warning px-4"
        type="button">Approve</a>
    <a href="{{ route('admin.asset_submission.reject', $assetSubmission->id) }}" class="btn btn-outline-danger px-4"
        type="button">Reject</a>
    @elseif (in_array($assetSubmission->status, ['approved']))
    <span class="fw-bolder">Klik untuk foto Pengambilan Barang:</span>
    <a href="{{ route('admin.asset_submission.show_take_picture', ['asset_submission' => $assetSubmission->id, 'action' => $assetSubmission->status]) }}"
        class="btn btn-warning px-4" type="button">
        Ambil Gambar
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill"
            viewBox="0 0 16 16">
            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
            <path
                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
        </svg>
    </a>
    @elseif (in_array($assetSubmission->status, ['borrowed']))
    <span class="fw-bolder">Klik untuk foto Pengembalian Barang:</span>
    <a href="{{ route('admin.asset_submission.show_take_picture', ['asset_submission' => $assetSubmission->id, 'action' => $assetSubmission->status]) }}"
        class="btn btn-warning px-4" type="button">
        Ambil Gambar
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill"
            viewBox="0 0 16 16">
            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
            <path
                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
        </svg>
    </a>
    @endif
</div>