<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class send_email_actionApiR extends FormRequest
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
            'email.*'     => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format Email Tidak Sesuai',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        // dd($validator->errors());
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
