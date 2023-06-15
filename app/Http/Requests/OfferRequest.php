<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'Title' => 'required',
            'Price' => 'required|numeric',
            'Description' => 'required',
            'Duration' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Title:required' =>"All fields are required",
            'Price:required' =>"All fields are required",
            'Description:required' =>"All fields are required",
            'Duration:required' =>"All fields are required",
            'Price:numeric' =>"Price must be a number"
        ];
    }
}
