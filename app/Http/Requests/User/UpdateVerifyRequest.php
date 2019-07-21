<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use ResponseJson;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateVerifyRequest extends FormRequest
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
        return [
            'phone' => 'required|unique:users|regex:/(09)[0-9]{9}/',
            'uu_id' => 'required',
            'code' => 'required|max:5',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        {
            throw new HttpResponseException(
                ResponseJson::message($validator->errors()->first())->code(-1)->get()
            );
        }

    }
}
