<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
        /* if($this->isMethod('GET')){
        return [
            //
            ];
        }elseif($this->isMethod('POST')){
        return [
            //
            ];
        } */

        $rules = [];

        switch($this->method()){
            case 'GET':
            break;
            case 'POST':
            case 'PUT' :
                $rules = [
                    "city"         => "required|max:50",
                    "phone"        => "required|max:20",
                    "addressLine1" => "required|max:50",
                    "country"      => "required|max:50",
                    "postalCode"   => "required",
                    "territory"    => "required"
                ];
            break;
            case 'PATCH':
            break;
            case 'DELETE':
            break;

        }
        return $rules;
    }
}
