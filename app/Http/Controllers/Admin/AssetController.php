<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssetStoreRequest;
use App\Http\Requests\Admin\UpdateAssetRequest;
use App\Models\AssetCategory;
use App\Models\Assets;
use App\Services\Admin\StoreAssetService;
use App\Services\Admin\UpdateAssetService;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qName = $request->input('name');
        $qType = $request->input('type');
        $qAssetCategory = $request->input('asset_category_id');

        $assets = Assets::with('asset_category')
            ->when($qName, function ($query, $qName) {
                return $query->where('name', 'like', "%{$qName}%");
            })
            ->when($qType, function ($query, $qType) {
                return $query->where('type', 'like', "%{$qType}%");
            })
            ->when($qAssetCategory, function ($query, $qAssetCategory) {
                return $query->where('asset_category_id', $qAssetCategory);
            })
            ->get();

        return view('app.admin.asset.index', [
            'assetCategories' => AssetCategory::all(),
            'assets' => $assets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.asset.create', [
            'assetCategories' => AssetCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetStoreRequest $request)
    {
        $service = new StoreAssetService(...$request->validated());
        $response = $service->call();

        if ($response[0] == true) {
            flash()->success('Berhasil menambahkan asset baru');
        } else {
            flash()->error('Gagal menambahkan asset baru');
        }

        return redirect()->route('admin.asset.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Assets $asset)
    {
        return view('app.admin.asset.edit', [
            'asset' => $asset,
            'assetCategories' => AssetCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssetRequest $request, Assets $asset)
    {
        $update = new UpdateAssetService(...$request->validated());
        $response = $update->call($asset);

        if ($response[0] == true) {
            flash()->success('Asset berhasil di ubah');
        } else {
            flash()->error($response[1]);
        }

        return redirect()->route('admin.asset.edit', $asset->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
