<?php

namespace App\Services\User;

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
