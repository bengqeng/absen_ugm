<?php

namespace App\Services\Admin;

use App\Models\Assets;
use App\Services\AbstractServices;

class UpdateAssetService extends AbstractServices
{
    private $success = false;

    private $message = '';

    public function __construct(
        private string $name,
        private ?string $type,
        private string $asset_category_id,
        private int $total_asset,
        private int $maintenance,
        private ?string $description,
    ) {
    }

    public function call(Assets $asset)
    {
        if ($this->validateAssetStatus($asset->status)) {
            $this->updateAsset($asset);
        }

        return $this->response();
    }

    private function updateAsset($asset)
    {
        $asset->update([
            'name' => $this->name,
            'type' => $this->type,
            'asset_category_id' => $this->asset_category_id,
            'description' => $this->description,
        ]);

        $asset->status->update([
            'ready' => $this->total_asset - ($this->maintenance + $asset->status->borrowed),
            'maintenance' => $this->maintenance,
            'total_asset' => $this->total_asset,
        ]);

        $this->success = true;
    }

    private function validateAssetStatus($assetStatus)
    {
        if ($this->maintenance + $assetStatus->borrowed > $this->total_asset) {
            $this->message = 'Total barang dan maintenance tidak sesuai!';

            return $this->success;
        }

        return true;
    }

    private function response()
    {
        return [$this->success, $this->message];
    }
}
