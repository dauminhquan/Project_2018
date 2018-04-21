<?php

namespace App\Http\Requests;

use App\Models\Protection;
use Illuminate\Foundation\Http\FormRequest;

class ProtectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Protection::where("time_start",$this->input("time_start"))->where("time_end",$this->input("time_end"))->count() > 0 )
        {
            return false;
        }
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
                        "timeStart" => "required| date",
                        "timeEnd" => "required|date"
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        "timeStart" => "required| date",
                        "timeEnd" => "required|date"
                    ];
                }
            default:break;
        }
        return [];
    }
}
