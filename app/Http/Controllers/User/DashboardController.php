<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AssetSubmission;
use App\Models\Attendance;
use App\Services\IpService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isAlreadyAbsentCheckIn = Attendance::where('user_id', auth()->user()->id)->whereDate('created_at', now())->first();
        $isAlreadyAbsentCheckOut = Attendance::where('user_id', auth()->user()->id)->whereNotNull('check_out')->whereDate('created_at', now())->first();
        $ipService = new IpService;
        $statusIp = $ipService->getUserStatusIp();

        return view('app.user.dashboard.index', [
            'attendances' => Attendance::where('user_id', auth()->user()->id)->latest()->take(5)->get(),
            'isAlreadyAbsentCheckIn' => $isAlreadyAbsentCheckIn !== null,
            'isAlreadyAbsentCheckOut' => $isAlreadyAbsentCheckOut !== null,
            'recent_hours_checkin' => (isset($isAlreadyAbsentCheckIn->hours_checkin)) ? $isAlreadyAbsentCheckIn->hours_checkin : '-',
            'recent_hours_checkout' => (isset($isAlreadyAbsentCheckIn->hours_checkout)) ? $isAlreadyAbsentCheckIn->hours_checkout : '-',
            'assetSubmission' => AssetSubmission::with('asset')->where('user_id', auth()->user()->id)->latest()->take(5)->get(),
            'statusIp' => $statusIp,
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
