<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Settings;
use App\Services\AbstractServices as AbstractService;

class IpService extends AbstractService
{
    public function getUserIp()
    {
        if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public function getUserStatusIp()
    {
        $status = Attendance::STATUS['remote'];
        $userIp = $this->getUserIp();
        $companyIps = Settings::groupbyfeature('ip')->get()->pluck('properties')->toArray();

        if (in_array($userIp, $companyIps)) {
            $status = Attendance::STATUS['office'];
        }

        return $status;
    }
}
