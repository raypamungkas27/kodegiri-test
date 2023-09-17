<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterActionR extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'no_hp'  => 'required|min:9|numeric',
            'password'      => [
                'required',
                'min:8',              // Minimal 8 karakter
                'regex:/[A-Z]+/',     // Mengandung huruf besar
                'regex:/[a-z]+/',     // Mengandung huruf kecil
                'regex:/[0-9]+/',     // Mengandung angka
                'regex:/[\W]+/'       // Mengandung simbol
            ],
            'k_password'      => 'required|same:password|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format Email Tidak Sesuai',
            'email.unique' => 'Email Sudah Ada',
            'no_hp.required' => 'No HP Wajib Diisi',
            'no_hp.min' => 'No HP Minimal 9 Digit',
            'no_hp.numeric' => 'No HP Harus Angka',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal 8 karakter',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
            'k_password.required' => 'Konfirmasi Password Wajib Diisi',
            'k_password.same' => 'Konfirmasi Password tidak sesuai dengan Password',
            'k_password.min' => 'Konfirmasi Password Minimal 8 karakter',

        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     dd($validator->errors());
    //     throw new HttpResponseException(response()->json($validator->errors(), 422));
    // }
}
