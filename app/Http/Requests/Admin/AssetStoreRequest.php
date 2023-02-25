<?php

namespace App\Http\Requests\Admin;

use App\Rules\PositiveNumber;
use Illuminate\Foundation\Http\FormRequest;

class AssetStoreRequest extends FormRequest
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
            'name' => ['max:255', 'required', 'unique:assets,name'],
            'type' => ['max:25', 'required'],
            'asset_category_id' => ['max:255', 'required', 'exists:asset_category,id'],
            'total_asset' => ['required_with:maintenance', 'gte:maintenance', 'numeric', 'integer', new PositiveNumber],
            'maintenance' => ['required_with:total_asset', 'numeric',  'integer', new PositiveNumber],
            'description' => ['max:255'],
        ];
    }
}
