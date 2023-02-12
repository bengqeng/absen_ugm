<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyPostRequest;
use App\Services\Auth\Service;
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
        $user = (new Service())->verifyLogin($request->validated());

        // Login failed
        if (empty($user)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        flash('Berhasil Login', 'success');
        if (auth()->user()->hasRole(['admin', 'super_admin'])) {
            return view('welcome');
        } else {
            return redirect()->route('staff.dashboard.index');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.show');
    }
}
