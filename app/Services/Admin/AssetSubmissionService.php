<?php

namespace App\Services\Admin;

use App\Models\AssetSubmission;
use App\Services\AbstractServices;

class AssetSubmissionService extends AbstractServices
{
    private $success = false;

    private $message = '';

    public function __construct(
        private AssetSubmission $assetSubmission
    ) {
    }

    public function approve()
    {
        if ($this->assetSubmission->status != 'pending') {
            $this->message = 'Status peminjaman bukan lagi pending!';

            return response();
        }

        $this->assetSubmission->status = 'approved';

        if ($this->assetSubmission->save()) {
            $this->success = true;
        } else {
            $this->message = 'Gagal melakukan approval asset!';
        }

        return $this->response();
    }

    public function reject()
    {
        if ($this->assetSubmission->status != 'pending') {
            $this->message = 'Status peminjaman bukan lagi pending!';

            return response();
        }

        $this->assetSubmission->status = 'rejected';

        if ($this->assetSubmission->save()) {
            $this->success = true;
        } else {
            $this->message = 'Gagal melakukan reject asset!';
        }

        return $this->response();
    }

    public function response()
    {
        return [$this->success, $this->message];
    }
}
