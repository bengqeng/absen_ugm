<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidStatusReport;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
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
            'email'  => ['required', 'unique:reports,email,' . $this->id . ',id'],
            'status' => ['required', new ValidStatusReport($this->id)],
        ];
    }
}
