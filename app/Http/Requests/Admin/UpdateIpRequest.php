<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIpRequest extends FormRequest
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
            'name' => ['required', 'max:100'],
            'properties' => ['required', 'ip'],
        ];
        if ($this->properties != $this->ip->properties) {
            array_push($rule['properties'], 'unique:settings,properties');
        }

        return $rule;
    }
}
