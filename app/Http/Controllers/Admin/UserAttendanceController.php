<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\AttendanceService;
use Illuminate\Http\Request;

class UserAttendanceController extends Controller
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
        if ($request->input('month') !== null && $request->input('year') !== null && $request->input('user_id') !== null) {
            $yearMonth = $this->createDateByYearMonth("{$request->input('year')}-{$request->input('month')}");
            if ($yearMonth === null) {
                flash()->error('Data yang di input tidak sesuai!!!');

                return redirect()->route('admin.attendance.index');
            }

            $response = new AttendanceService();
            $attendances = $response->getListAttendance($request->input('month'), $request->input('year'), $yearMonth);
        }

        return view('app.admin.attendance.index', [
            'users' => User::ListByActorRole()->get(),
            'months' => $this->getMonthInYear(now()),
            'years' => $this->getYearViceVersa(now(), 3),
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
     * @param  \Illuminate\Http\Request  $request
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
