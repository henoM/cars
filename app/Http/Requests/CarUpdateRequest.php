<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
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
            'x' => 'required|regex:/^\-?\d*(\.\d{1,9})?$/|numeric|between:-85,85',
            'y' => 'required|regex:/^\-?\d*(\.\d{1,9})?$/|numeric|between:-180,180',
        ];
    }
}
