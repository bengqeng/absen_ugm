<?php

namespace App\Services\Admin;

use App\Models\Assets;
use App\Models\AssetStatus;
use App\Services\AbstractServices;
use Illuminate\Support\Arr;

class StoreAssetService extends AbstractServices
{
    private $success = false;
    private $record = null;
    public function __construct(
        private string $name,
        private string $type,
        private string $asset_category_id,
        private int $total_asset,
        private int $maintenance,
        private string $description,
    ) {
    }

    public function call()
    {
        $asset = $this->createAsset();
        if ($asset === false) {
            return $this->response();
        }

        $assetStatus = $this->createAssetStatus($asset);
        if ($assetStatus !== false) {
            $this->success = true;
            $this->record = $asset;
        }

        return $this->response();
    }

    private function createAsset()
    {
        $asset = new Assets();
        $asset->name = $this->name;
        $asset->type = $this->type;
        $asset->description = $this->description;
        $asset->asset_category_id = $this->asset_category_id;

        if ($asset->save()) {
            return $asset;
        } else {
            return false;
        }
    }

    private function createAssetStatus(Assets $asset)
    {
        $assetStatus = new AssetStatus();
        $assetStatus->assets_id = $asset->id;
        $assetStatus->total_asset = $this->total_asset;
        $assetStatus->maintenance = $this->maintenance;
        $assetStatus->ready = $this->total_asset - $this->maintenance;

        if ($assetStatus->save()) {
            return $assetStatus;
        } else {
            return false;
        }
    }

    private function response()
    {
        return [$this->success, $this->record];
    }
}
