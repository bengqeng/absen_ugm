<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidStatusReport;
use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
        return [
            'name'   => ['required', 'max:25'],
            'email'  => ['required', 'unique:reports,email'],
            'status' => ['required', new ValidStatusReport()],
        ];
    }
}
