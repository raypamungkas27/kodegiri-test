<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class myProfileActionR extends FormRequest
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
        $userId = auth()->id();
        return [
            'name'      => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'nohp'      => 'required|min:9',
            'company'      => 'required|regex:/^[a-zA-Z\s]+$/',
            'divisi'      => 'required|regex:/^[a-zA-Z\s]+$/',
            'foto_profil'      => 'file|mimes:jpg,jpeg,png|max:5024',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'name.regex' => 'Nama Wajib Text',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format Email Tidak Sesuai',
            'nohp.required' => 'No HP Wajib Diisi',
            'nohp.min' => 'No HP Minimal 9 Digit',
            'company.required' => 'Company Wajib Diisi',
            'company.regex' => 'company Wajib Text',
            'divisi.required' => 'Divisi Wajib Diisi',
            'divisi.regex' => 'divisi Wajib Text',
            'foto_profil.mimes' => 'Pas Photo Wajib jpg/jpeg/png/pdf',
            'foto_profil.max' => 'Pas Photo Maksimal 5 MB',

        ];
    }
}
