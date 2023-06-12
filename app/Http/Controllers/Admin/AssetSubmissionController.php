<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TakePictureRequest;
use App\Models\Assets;
use App\Models\AssetSubmission;
use App\Services\Admin\AssetSubmissionService;
use App\Services\GetNameUserService;
use Illuminate\Http\Request;

class AssetSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowingAssets = AssetSubmission::with('asset')->with('owner')->StatusOnly(['pending', 'approved'])->latest()->take(5)->get();
        $returningAssets = AssetSubmission::with('asset')->with('owner')->StatusOnly(['borrowed'])->latest()->take(5)->get();
        $historyAssets = AssetSubmission::with('asset')->with('owner')->StatusOnly(['done', 'rejected'])->latest()->take(5)->get();
        // dd($borrowingAssets);
        return view('app.admin.asset_submission.index', [
            'borrowingAssets' => $borrowingAssets,
            'returningAssets' => $returningAssets,
            'historyAssets' => $historyAssets,
            'firstName' => app(GetNameUserService::class),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show($asset_submission)
    {
        $assetSubmission = AssetSubmission::with('owner')->with('asset')->findOrFail($asset_submission);

        return view('app.admin.asset_submission.detail', [
            'assetSubmission' => $assetSubmission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Assets $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assets $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assets $asset)
    {
        //
    }

    public function approve(AssetSubmission $asset_submission)
    {
        $response = (new AssetSubmissionService(assetSubmission: $asset_submission))->approve();

        if ($response[0]) {
            flash()->success('Berhasil approve peminjaman!');
        } else {
            flash()->error($response[1]);
        }

        return redirect()->back();
    }

    public function reject(AssetSubmission $asset_submission)
    {
        $response = (new AssetSubmissionService(assetSubmission: $asset_submission))->reject();

        if ($response[0]) {
            flash()->success('Berhasil reject peminjaman!');
        } else {
            flash()->error($response[1]);
        }

        return redirect()->back();
    }

    public function takePictureOnUserTakeAsset(AssetSubmission $asset_submission, $action)
    {
        return view('app.admin.asset_submission.take_picture', [
            'status' => $action,
            'assetSubmission' => $asset_submission,
        ]);
    }

    public function saveTakePictureOnUserTakeAsset(TakePictureRequest $request, AssetSubmission $asset_submission)
    {
        abort_if($asset_submission->status != $request->validated('action'), 404);

        if ($request->validated('action') == 'approved') {
            $asset_submission->status = 'borrowed';
            $asset_submission->approval_id = auth()->user()->id;
            $asset_submission->photo_taking_asset = $request->validated('photo');
            $asset_submission->user_date_take = now();
        } else {
            $asset_submission->status = 'done';
            $asset_submission->return_approval_id = auth()->user()->id;
            $asset_submission->photo_returning_asset = $request->validated('photo');
            $asset_submission->user_date_return = now();

            $assetStatus = $asset_submission->asset->status;
            $readyOld = $assetStatus->ready;
            $readyBorrowed = $assetStatus->borrowed;

            $assetStatus->ready = $readyOld + 1;
            $assetStatus->borrowed = $readyBorrowed - 1;
            $assetStatus->save();
        }

        if ($asset_submission->save()) {
            flash()->success('Berhasil mengubah status peminjaman asset');
        } else {
            flash()->error('Gagal mengubah status peminjaman asset');
        }

        return redirect()->route('admin.asset_submission.show', ['asset_submission' => $asset_submission->id]);
    }
}
