<?php

namespace App\Http\Requests\Admin;

use App\Rules\PositiveNumber;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
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
            'name' => ['max:255', 'required'],
            'type' => ['max:25', 'required'],
            'asset_category_id' => ['max:255', 'required', 'exists:asset_category,id'],
            'total_asset' => ['required', 'numeric', 'integer', new PositiveNumber],
            'maintenance' => ['required', 'numeric',  'integer', new PositiveNumber],
            'description' => ['max:255'],
        ];

        if ($this->name != $this->asset->name) {
            array_push($rule['name'], 'unique:assets,name');
        }

        return $rule;
    }
}
