<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class storeCategoryRequest extends FormRequest
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
            'name' => 'required|unique:stories',
        ];
    }
}
