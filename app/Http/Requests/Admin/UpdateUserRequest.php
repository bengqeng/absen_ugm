<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidGender;
use App\Rules\ValidProjectId;
use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'phone_number' => [],
            'role' => ['required', new ValidRole],
            'gender' => ['required', new ValidGender],
            'project_id' => ['required', new ValidProjectId],
        ];

        if ($this->password !== null) {
            $rule['password'] = ['required', 'min:8', 'confirmed'];
        }

        if ($this->email != $this->user->email) {
            array_push($rule['email'], 'unique:users');
        }

        return $rule;
    }
}
