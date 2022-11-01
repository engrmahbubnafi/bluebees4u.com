<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
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
            "customer_id" => "required",
            "account_number" => "required_if:status,==,received",
            "transaction_id" => "required_if:status,==,received",
            "amount" => "numeric|nullable",
            "payment_package" => "required",
            "promotion_code" => "nullable",
            "status" => "required",
            "additional_amount" => "numeric|nullable",
            "additional_amount_note" => "nullable",
            "third_party.*.name" => "sometimes|required_with:third_party.*.amount",
            "third_party.*.amount" => "required_with:third_party.*.name|nullable|numeric",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'third_party.*.name.required_with' => 'Third party name is required when amount field is not empty!',
            'third_party.*.amount.required_with' => 'Third party amount is required when name field is not empty!',
            'third_party.*.amount.numeric' => 'Third party amount must be numeric!',
        ];
    }
}
