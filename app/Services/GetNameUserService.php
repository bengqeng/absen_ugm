<?php

namespace App\Services;


class GetNameUserService
{
    public function execute(string $fullName): string
    {
        $nameParts = explode(' ', trim($fullName));
        $firstName = $nameParts[0];


        $alternateNames = ['Muhammad', 'Ahmad', 'M.', 'Muh'];

        if (in_array($firstName, $alternateNames)) {
            // Use the second name if the first name is one of the alternate names
            return isset($nameParts[1]) ? $nameParts[1] : $nameParts[0];
        } else {
            // Otherwise, return the first name
            return $firstName;
        }
    }
}
