<?php

namespace App\Rules;

use App\Models\Role;
use Illuminate\Contracts\Validation\InvokableRule;

class ValidRole implements InvokableRule
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
        if (Role::find($value) === null) {
            $fail(':attribute tidak ditemukan!.');
        }
    }
}
