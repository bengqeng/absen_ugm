<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\InvokableRule;

class ValidStatusUserType implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (! in_array($value, array_keys(User::STATUSTYPE))) {
            $fail(':attribute tidak ditemukan!.');
        }
    }
}
