<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyPostRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

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

            // NEED TO UPDATE THIS RETURN to redirect
            return view('welcome');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
