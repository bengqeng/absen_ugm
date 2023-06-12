<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIpRequest;
use App\Http\Requests\Admin\UpdateIpRequest;
use App\Models\Settings;

class IpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.admin.profile.settings.ip.index', [
            'listIp' => Settings::where('key', Settings::FEATURES['ip'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.profile.settings.ip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIpRequest $request)
    {
        $ipAttribute = ['key' => Settings::FEATURES['ip'], 'name' => $request->validated('name'), 'properties' => $request->validated('ip')];
        if (Settings::Create($ipAttribute)) {
            flash()->success('Berhasil tambah ip');
        } else {
            flash()->error('Gagal tambah ip');
        }

        return redirect()->route('admin.settings.ip.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    public function edit(Settings $ip)
    {
        return view('app.admin.profile.settings.ip.edit', [
            'ip' => $ip,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIpRequest $request, Settings $ip)
    {
        if ($ip->update($request->validated())) {
            flash()->success('Berhasil update ip');
        } else {
            flash()->error('Gagal update ip');
        }

        return redirect()->route('admin.settings.ip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
