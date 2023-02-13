<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exceptions\Handler;

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
            $today = $this->createDateByYearMonth("{$request->input('year')}-{$request->input('month')}");
            if ($today === null){
                return redirect()->route('staff.attendance.index');
            }

            $days = $this->getListDateMonth($today);
            $attendances = Attendance::when($request->input('month'), function ($query, $month) {
                $query->whereMonth('created_at', $month);
            })
            ->when($request->input('year'), function ($query, $year) {
                $query->whereYear('created_at', $year);
            })
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d');
            })
            ->toArray();
            $attendances = $this->formatIndex($days, $attendances);
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
    public function show(Attendance $attendance)
    {
        //
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

    private function formatIndex($days, $attendances)
    {
        $data = [];
        foreach ($days as $key => $value) {
            $record = null;
            if (array_key_exists($value->format('d'), $attendances)) {
                $record = $attendances[$value->format('d')][0];
            }
            array_push($data, ['date' => $value, 'attendance' => $record]);
        }

        return $data;
    }
}
