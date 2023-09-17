<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class loginActionApiR extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format Email Tidak Sesuai',
            'password.required' => 'Password Wajib Diisi',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        // dd($validator->errors());
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
