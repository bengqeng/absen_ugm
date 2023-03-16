<?php

namespace App\Http\Requests\Admin;

use App\Rules\IsNumber;
use Illuminate\Foundation\Http\FormRequest;

class AssetIndexRequest extends FormRequest
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
            'search_category' => ['required'],
            'search' => ['max:25', 'required'],
        ];
    }
}
