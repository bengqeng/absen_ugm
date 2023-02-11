<?php

namespace App\Services\User;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AbsentService
{
    protected $dateAbsen;
    protected $user;

    public function __construct($user)
    {
        $this->dateAbsen = now();
        $this->user = $user;
    }

    public function call()
    {
    }
}
