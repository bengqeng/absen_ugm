<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateBorrowAssetsRequest;
use App\Http\Requests\User\StoreBorrowAssetsRequest;
use App\Models\AssetCategory;
use App\Models\Assets;
use App\Models\User;
use App\Services\User\StoreBorrowAssetService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BorrowAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $asset_category_id = $request->input('asset_category_id');
        if ($asset_category_id) {
            $assets = Assets::with('status')
                ->when($asset_category_id, function ($query, $asset_category_id) {
                    return $query->where('asset_category_id', $asset_category_id);
                })->paginate(10);
        } else {
            $assets = Assets::with('status')->paginate(10);
        }

        return view('app.user.borrow_asset.index', [
            'assets' => $assets,
            'categories' => AssetCategory::all(),
            'selectedCategory' => AssetCategory::find($asset_category_id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateBorrowAssetsRequest $request, User $user)
    {
        return view('app.user.borrow_asset.create', [
            'user' => $user,
            'asset' => Assets::with('status')->find($request->validated('assets')),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorrowAssetsRequest $request, User $user)
    {
        $store = (new StoreBorrowAssetService(...Arr::add($request->validated(), 'user', $user)))->call();
        if ($store[0]) {
            flash()->success('Berhasil melakukan peminjaman');

            return redirect()->route('staff.asset_submission.index', ['user' => auth()->user()->id]);
        } else {
            flash()->error($store[1]);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user, Assets $assets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Assets $assets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assets $assets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assets $assets)
    {
        //
    }
}
