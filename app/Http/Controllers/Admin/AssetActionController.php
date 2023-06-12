<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetSubmission;
use Illuminate\Http\Request;

class AssetActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function index_borrow(Request $request)
    {
        $searchCategory = $request->input('search_category');
        $searchQuery = $request->input('search');

        // Create a base query for the AssetSubmission model
        $query = AssetSubmission::query();
        // Apply the condition based on the selected option
        if ($searchCategory === 'user_name') {
            // Search by the user's name
            $query->whereHas('owner', function ($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%'.$searchQuery.'%');
            });
        } elseif ($searchCategory === 'asset_name') {
            // Search by the asset's name
            $query->whereHas('asset', function ($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%'.$searchQuery.'%');
            });
        } elseif ($searchCategory === 'date') {
            // Search by the date
            $query->whereDate('date_borrow', $searchQuery);
        }

        // Retrieve the filtered results
        $results = $query->with('owner')->StatusOnly(['pending', 'approved'])->latest()->take(10)->get();

        // $borrowingAssets = AssetSubmission::with('asset')->with('owner')->where('status', 'pending')->latest()->take(10)->get();
        return view('app.admin.asset_action.index_borrow', [
            'borrowingAssets' => $results,
        ]);
    }

    public function index_return(Request $request)
    {
        $searchCategory = $request->input('search_category');
        $searchQuery = $request->input('search');

        // Create a base query for the AssetSubmission model
        $query = AssetSubmission::query();
        // Apply the condition based on the selected option
        if ($searchCategory === 'user_name') {
            // Search by the user's name
            $query->whereHas('owner', function ($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%'.$searchQuery.'%');
            });
        } elseif ($searchCategory === 'asset_name') {
            // Search by the asset's name
            $query->whereHas('asset', function ($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%'.$searchQuery.'%');
            });
        } elseif ($searchCategory === 'date') {
            // Search by the date
            $query->whereDate('date_return', $searchQuery);
        }

        // Retrieve the filtered results
        $results = $query->with('owner')->where('status', ['borrowed'])->latest()->take(10)->get();

        return view('app.admin.asset_action.index_return', [
            'returningAssets' => $results,
        ]);
    }

    public function index_history(Request $request)
    {
        $searchCategory = $request->input('search_category');
        $searchQuery = $request->input('search');
        // Create a base query for the AssetSubmission model
        $query = AssetSubmission::query();
        // Apply the condition based on the selected option
        if ($searchCategory === 'user_name') {
            // Search by the user's name
            $query->whereHas('owner', function ($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%'.$searchQuery.'%');
            });
        } elseif ($searchCategory === 'asset_name') {
            // Search by the asset's name
            $query->whereHas('asset', function ($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%'.$searchQuery.'%');
            });
        } elseif ($searchCategory === 'date') {
            // Search by the date
            $query->whereDate('date_borrow', $searchQuery);
        } elseif ($searchCategory === 'status') {
            // Search by the status
            $query->where('status', $searchQuery);
        }

        // Retrieve the filtered results
        $results = $query->with('owner')->where('status', ['done', 'rejected'])->latest()->take(10)->get();

        return view('app.admin.asset_action.index_history', [
            'historyAssets' => $results,
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
