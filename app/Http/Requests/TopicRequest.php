<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
                        "describe" => "required",
                        "name_topic" => "required| unique:topics,name_topic",
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        "describe" => "required",
                        "name_topic" => "required",
                    ];
                }
            default:break;
        }

        return [];
    }
}