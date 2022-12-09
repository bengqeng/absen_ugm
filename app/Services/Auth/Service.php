<?php
namespace App\Services\Auth;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Service {
    public function verifyLogin($user)
    {
        Auth::attempt(Arr::add($user, 'status_type', USER::STATUSTYPE['active']));
        return Auth::user();
    }
}
