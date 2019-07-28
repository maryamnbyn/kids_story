<?php

namespace App\Http\Requests\story;

use Illuminate\Foundation\Http\FormRequest;

class storeStoryRequest extends FormRequest
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
            'name'      => 'required|unique:stories',
            'title'      => 'required',
            'writer'      => 'required',
            'age'      => 'required',
            'category'      => 'required',
            'publisher'      => 'required',
            'designer'      => 'required',
            'talker'      => 'required',
            'abstract' => 'required',
        ];
    }
}
