<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CountryStoreRequest extends FormRequest
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
            'country_name'=>'required|string|max:255|unique:countries',
            'capital_city'=>'required|string|max:255',
            'telephone_code'=>'required|string|max:255|unique:countries',
            'country_code'=>'required|string|max:255|unique:countries'
        ];
    }
    /**
     * When validation fails
     */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response(["Status"=>false,"Error"=>$validator->errors()->first()], 422));
    }
}
