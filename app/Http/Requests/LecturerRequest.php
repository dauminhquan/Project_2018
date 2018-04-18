<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerRequest extends FormRequest
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
                "name_lecturer" => "required",
                "address_lecturer" => "required",
                "email_address_lecturer" => "required| unique.lecturers,email_address_lecturer",
                "phone_number" => "required",
                "id_department" => "required|integer",
                "id_field" => "required|integer",
            ];
        }
        return [];
    }
}
