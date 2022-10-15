<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'Name' => 'required',
            'Email' => 'required|email',
            'Discount' => 'nullable',
            'Company' => 'required',
            'Phone' => 'required',
            'ContactName' => 'nullable',
            'PostalCode' => 'nullable|digits:5',
            'City' => 'nullable',
            'address_email' => 'nullable|email',
            'Address' => 'nullable',
            'Neighborhood' => 'nullable',
            'State' => 'nullable',
            'address_phone' => 'nullable',
            'billing_ContactName' => 'nullable',
            'billing_PostalCode' => 'nullable|digits:5',
            'billing_City' => 'nullable',
            'billing_address_email' => 'nullable|email',
            'billing_Address' => 'nullable',
            'billing_Neighborhood' => 'nullable',
            'billing_State' => 'nullable',
            'billing_address_phone' => 'nullable',
            'BusinessName' => 'nullable',
            'Rfc' => 'nullable|digits:13',
            'Cfdi' => 'nullable',
            'user_address' => 'nullable',
       ];
    }
}
