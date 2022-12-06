<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.show');
    }
}
