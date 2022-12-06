<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function index()
    {
        return view('app.user.show_list', [
            'users' => User::listbyactorrole()->paginate(1),
        ]);
    }
}
