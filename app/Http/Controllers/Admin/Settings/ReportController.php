<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReportRequest;
use App\Jobs\ProcessAttendanceCustomBulkDownload;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.admin.profile.settings.report.index', [
            'reportEmail' => Report::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.profile.settings.report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $ipAttribute = [
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'status' => $request->validated('status')
        ];
        if (Report::Create($ipAttribute)) {
            flash()->success('Berhasil menambahkan email');
        } else {
            flash()->error('Gagal menambahkan email');
        }

        return redirect()->route('admin.settings.report.index');
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
        return view('app.admin.profile.settings.report.edit', [
            'report' => Report::find($id),
        ]);
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

    public function filterDownload()
    {
        return view('app.admin.profile.settings.report.download', [
            'months' => $this->getMonthInYear(now()),
            'years' => $this->getYearViceVersa(now(), 3),
        ]);
    }

    public function download(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required|',
            'year' => 'required|integer',
        ]);
        ProcessAttendanceCustomBulkDownload::dispatch($validated['year'], $validated['month']);
        flash()->success('Berhasil download data! system akan otomatis mengirimkan ke alamat email yang dituju.');

        return redirect()->route('admin.settings.report.filterDownload');
    }
}
