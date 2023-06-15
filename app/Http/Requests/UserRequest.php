<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Name'=>'required',
            'LastName'=>'required',
            'Phone'=>'required|numeric',
            'Email'=>'required|email',
        ];
    }
    public function messages(): array
    {
        return [
            'Name:required'=>'All Fields are required',
            'LastName:required'=>'All Fields are required',
            'Phone:required'=>'All Fields are required',
            'Email:required'=>'All Fields are required',
            'Phone:numeric'=>'Phone number non valid',
            'Email:email'=>'Email non valid'
        ];
    }
}
