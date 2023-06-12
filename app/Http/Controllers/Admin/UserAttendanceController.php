<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserAttendanceIndexRequest;
use App\Models\User;
use App\Services\AttendanceService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserAttendanceIndexRequest $request)
    {
        $attendances = [];
        if ($request->validated('month') !== null && $request->validated('year') !== null && $request->validated('user_id') !== null) {
            $yearMonth = $this->createDateByYearMonth("{$request->input('year')}-{$request->input('month')}");
            if ($yearMonth === null) {
                flash()->error('Data yang di input tidak sesuai!!!');

                return redirect()->route('admin.attendance.index');
            }

            $response = new AttendanceService();
            $attendances = $response->getListAttendance($request->input('month'), $request->input('year'), $yearMonth, $request->input('user_id'));

            if ($request->input('print') === 'print') {
                $export = $response->exportAttendance($request->input('month'), $request->input('year'), $yearMonth, $request->input('user_id'));

                return Excel::download($export, 'Absensi-'.User::find($request->input('user_id'))->name.'-bulan-'.$request->input('month').'-tahun-'.$request->input('year').'.xlsx');
            }
        }

        return view('app.admin.attendance.index', [
            'users' => User::ListByActorRole()->get(),
            'months' => $this->getMonthInYear(now()),
            'years' => $this->getYearViceVersa(now(), 3),
            'attendances' => $attendances,
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
        $response = new AttendanceService();
        $attendances = $response->getDetailAttendance($id);

        return $attendances;
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
