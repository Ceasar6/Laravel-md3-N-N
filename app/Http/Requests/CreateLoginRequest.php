<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoginRequest extends FormRequest
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
            'name' => 'required|min:4',
            'password' => 'required|',
        ];
    }
    public function messages()
    {
        return ['name.required'=>'Khong de trong',
                'name.min'=>'it nhat 4 ky tu tro len',
                'password.required'=>'password khong duoc de trong'];

    }
}
