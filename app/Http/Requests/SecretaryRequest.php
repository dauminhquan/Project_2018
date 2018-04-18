<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecretaryRequest extends FormRequest
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
       if($this->isMethod("POST"))
       {
           return [
               //
               "name_secretary" => "required",
               "address_secretary" => "required",
               "email_address_secretary" => "required|unique:secretaries,email_address_secretary",
               "phone_number" => "required",
           ];
       }
       return [];
    }
}
