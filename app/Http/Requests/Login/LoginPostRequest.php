<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginPostRequest extends FormRequest
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
            'phone_number'=>'required|string|min:10|max:13',
            'password'=>'required|string'
        ];
    }
    /**
     * When validation fails
     */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response(["Status"=>false,"Error"=>$validator->errors()->first()], 422));
    }
}
