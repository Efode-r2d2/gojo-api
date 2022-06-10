<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PropertyPutRequest extends FormRequest
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
            'property_title'=>'required|string|max:255',
            'property_description'=>'string',
            'property_type_id'=>'required|numeric',
            'price'=>'required' 
        ];
    }

    /**
     * When validation fails
     */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response(["Status"=>false,"Error"=>$validator->errors()->first()], 422));
    }
}
