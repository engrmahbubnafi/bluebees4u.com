<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddonUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "addon_title" => "required",
            "addon_price" => "required",
            "status" => "nullable",
        ];
    }
}
