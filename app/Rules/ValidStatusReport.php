<?php

namespace App\Rules;

use App\Models\Report;
use Illuminate\Contracts\Validation\Rule;

class ValidStatusReport implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $id;
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->id != null && $value == 'primary') {
            $exists = Report::where('status', $value)->whereNotIn('id', [$this->id])
                ->exists();
            if ($exists) {
                return false;
            }

            return true;
        }

        if ($value == 'primary') {
            $exists = Report::where('status', $value)
                ->exists();
            if ($exists) {
                return false;
            }
            return true;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute telah digunakan pada email lain';
    }
}
