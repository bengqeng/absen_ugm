<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\VerifyPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;

class VerifyAuthController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function verify(VerifyPostRequest $request)
    {
        if (Auth::attempt(Arr::add($request->validated(), 'status_type', USER::STATUSTYPE['active']))) {
            $request->session()->regenerate();
            flash('Hurray', 'danger');

            # NEED TO UPDATE THIS RETURN to redirect
            return view('welcome');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }
}
