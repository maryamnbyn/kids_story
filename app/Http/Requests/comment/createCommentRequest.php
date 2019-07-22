<?php

namespace App\Http\Requests\comment;

use Illuminate\Foundation\Http\FormRequest;
use ResponseJson;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class createCommentRequest extends FormRequest
{

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
            'story_id' => 'required',
            'body' => 'required',
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
