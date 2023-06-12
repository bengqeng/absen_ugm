<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Services\IpService;
use App\Services\User\AbsentService;
use Illuminate\Http\Request;

class CheckOutController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = new IpService();

        return view('app.user.attendance.check_out', ['statusIp' => $status->getUserStatusIp()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'note_out' => 'nullable|max:255',
            'overtime' => 'nullable|numeric|min:1|max:9999',
            'note_overtime' => 'nullable|max:255',
        ]);

        $call = new AbsentService(auth()->user());
        $response = $call->checkOut(now(), $validated);
        if ($response[0] == false) {
            flash()->error($response[1]);
        } else {
            flash()->success('Berhasil Menyimpan Data Check Out');
        }

        return redirect()->route('staff.dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
