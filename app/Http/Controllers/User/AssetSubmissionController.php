<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\AssetSubmission;
use App\Models\User;
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
        return view('app.user.asset_submission.index', [
            'onProgressSubmissions' => AssetSubmission::with('owner')->with('asset')->StatusOnly(['pending', 'approved'])->where('user_id', auth()->user()->id)->latest()->take(5)->get(),
            'finishedSubmissions' => AssetSubmission::with('asset')->where('user_id', auth()->user()->id)->StatusOnly(['done', 'rejected'])->latest()->take(10)->get(),
        ]);
    }

    public function on_progress_submission_index()
    {
        return view('app.user.asset_submission.on_progress_submission_index', [
            'onProgressSubmissions' => AssetSubmission::with('owner')->with('asset')->StatusOnly(['pending', 'approved'])->where('user_id', auth()->user()->id)->latest()->get(),
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
    public function show(User $user, AssetSubmission $asset_submission)
    {
        return view('app.user.asset_submission.detail', [
            'assetSubmission' => $asset_submission,
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
}
