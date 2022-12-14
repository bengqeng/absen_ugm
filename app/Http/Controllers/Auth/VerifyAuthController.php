<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyPostRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\Service;

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

        # Login failed
        if (empty($user)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        flash('Berhasil Login', 'success');
        // NEED TO UPDATE THIS RETURN to redirect
        return view('welcome');
    }
}
