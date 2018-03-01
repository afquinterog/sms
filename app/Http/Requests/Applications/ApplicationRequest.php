<?php

namespace App\Http\Requests\Applications;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class ApplicationRequest extends FormRequest
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
            'code' => 'required|unique',          
            'name' => 'required'
        ];





    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required' => 'El campo código es requerido',
            'name.required'  => 'El campo nombre es requerido'

        ];
    }
}
