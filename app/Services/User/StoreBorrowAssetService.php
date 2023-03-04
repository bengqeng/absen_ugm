<?php

namespace App\Services\User;

use App\Models\Assets;
use App\Models\AssetStatus;
use App\Models\AssetSubmission;
use App\Models\User;

class StoreBorrowAssetService
{
    protected $user;

    protected $status = false;

    protected $message = '';

    protected $record = null;

    protected ?Assets $assetRecord = null;

    protected ?AssetStatus $assetStatus = null;

    public function __construct(
        private string $date_borrow,
        private string $date_return,
        private ?string $description_borrow,
        private string $asset,
        User $user
    ) {
        $this->user = $user;
        $this->assetRecord = $this->findAsset();
        $this->assetStatus = $this->assetRecord->status;
    }

    public function call()
    {
        if ($this->validateAssetReady()) {
            if ($this->changeAssetStatusReady()) {
                $this->createAssetSubmission();
            }
        }

        return $this->response();
    }

    private function validateAssetReady()
    {
        if (! $this->assetRecord->canBorrowed()) {
            $this->message = 'Tidak ada asset yang free untuk dipinjamkan';

            return false;
        }

        return true;
    }

    private function changeAssetStatusReady()
    {
        $this->assetStatus->borrowed = $this->assetStatus->borrowed + 1;
        $this->assetStatus->ready = $this->assetStatus->ready - 1;

        if ($this->assetStatus->save()) {
            return true;
        } else {
            $this->message = 'Gagal update asset status';

            return false;
        }
    }

    private function createAssetSubmission()
    {
        $new = new AssetSubmission();
        $new->user_id = $this->user->id;
        $new->asset_id = $this->assetRecord->id;
        $new->status = 'pending';
        $new->total_borrowed = 1;
        $new->date_borrow = $this->date_borrow;
        $new->date_return = $this->date_return;
        $new->description_borrow = $this->description_borrow;

        if ($new->save()) {
            $this->record = $new;

            return true;
        } else {
            $this->message = 'Gagal membuat peminjaman';

            return false;
        }
    }

    protected function findAsset()
    {
        return Assets::find($this->asset);
    }

    private function response()
    {
        return [$this->status, $this->message, $this->record];
    }
}
