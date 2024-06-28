<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|max:50',
            'body'=>'required',
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'A title is required',
        'title.max' => 'A title allows only 50 letters',
        'body.required' => 'A message is required',
    ];
}
}
