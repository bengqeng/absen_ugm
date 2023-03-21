<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attendances = [];
        $days = [];
        if ($request->input('month') !== null && $request->input('year') !== null) {
            $yearMonth = $this->createDateByYearMonth("{$request->input('year')}-{$request->input('month')}");
            if ($yearMonth === null) {
                flash()->error('Data yang di input tidak sesuai!!!');

                return redirect()->route('staff.attendance.index');
            }

            $response = new AttendanceService();
            $attendances = $response->getListAttendance($request->input('month'), $request->input('year'), $yearMonth, auth()->user()->id);
        }

        return view('app.user.attendance.index', [
            'attendances' => $attendances,
            'years' => $this->getYearViceVersa(now(), 3),
            'months' => $this->getMonthInYear(now()),
        ])->withInput($request->input());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = new AttendanceService();
        $attendances = $response->getDetailAttendance($id);

        return $attendances;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
