<?php

namespace App\Http\Requests\Admin;

use App\Rules\IsNumber;
use Illuminate\Foundation\Http\FormRequest;

class UserAttendanceIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [
            'user_id' => [],
            'month' => [],
            'year' => [],
        ];

        if ($this->input('user_id') !== null) {
            $rule['user_id'] = [new IsNumber()];
        }

        if ($this->input('month') !== null) {
            $rule['month'] = [new IsNumber()];
        }

        if ($this->input('year') !== null) {
            $rule['year'] = [new IsNumber()];
        }

        return $rule;
    }
}
