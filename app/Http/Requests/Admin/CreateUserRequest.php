<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users', 'email:rfc,dns'],
            'role' => ['required', new ValidRole],
            'password' => ['required', 'min:8', 'confirmed']
        ];
    }
}
