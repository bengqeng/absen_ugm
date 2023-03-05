<div class="d-flex justify-content-end gap-1">
    @if (in_array($assetSubmission->status, ['pending']))
    <a href="{{ route('admin.asset_submission.approve', $assetSubmission->id) }}" class="btn btn-outline-warning px-4"
        type="button">Approve</a>
    <a href="{{ route('admin.asset_submission.reject', $assetSubmission->id) }}" class="btn btn-outline-danger px-4"
        type="button">Reject</a>
    @elseif (in_array($assetSubmission->status, ['approved', 'borrowed']))
    <a href="{{ route('admin.asset_submission.show_take_picture', ['asset_submission' => $assetSubmission->id, 'action' => $assetSubmission->status]) }}"
        class="btn btn-outline-warning px-4" type="button">Take Picture</a>
    @elseif (in_array($assetSubmission->status, ['borrowed']))
    <button>Ambil Gambar</button>
    @endif
</div>