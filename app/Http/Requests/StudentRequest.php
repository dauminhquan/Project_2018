<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        //
                        "code" => "required|unique:students,code",
                        "student_name" => "required",
                        "address" => "required",
                        "id_department" => "required|integer",
                        "id_course" => "required|integer",
                        "id_branch" => "required|integer"
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        "student_name" => "required",
                        "address" => "required",
                        "id_department" => "required|integer",
                        "id_branch" => "required|integer"
                    ];
                }
            default:break;
        }
       return [];
    }

    public function messages()
    {
        return [
            "code.required" => "Khong co code",
            "student_name.required" => "Khong co ten sv",
            "address.required" => "Khong có địa chỉ",
            "id_department.required" => "Khong có khoa",
            "id_course.required" => "Khong co khóa",
            "id_branch.required" => "Khong co ngành"
        ];
    }
//    public function validate($data)
//    {
//        return Validator::make($data, $this->rules(), $this->messages());
//    }



}
