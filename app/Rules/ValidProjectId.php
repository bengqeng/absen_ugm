<?php

namespace App\Rules;

use App\Models\Project;
use Illuminate\Contracts\Validation\InvokableRule;

class ValidProjectId implements InvokableRule
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
        if (Project::find($value) === null) {
            $fail(':attribute tidak ditemukan!.');
        }
    }
}
