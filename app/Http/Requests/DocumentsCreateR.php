<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsCreateR extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'tanggal_signing' => 'required',
            'jabatan_signing' => 'required',
            'nama_signing' => 'required',
            'signing' => 'required|file|mimes:jpg,jpeg,png',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul dokumen wajib diisi.',
            'content.required' => 'Isi dokumen wajib diisi.',
            'tanggal_signing.required' => 'Isi Tanggal dokumen wajib diisi.',
            'jabatan_signing.required' => 'Isi Jabatan Penanggung Jawab dokumen wajib diisi.',
            'nama_signing.required' => 'Isi Nama Penanggung Jawab dokumen wajib diisi.',
            'signing.required' => 'Tanda tangan wajib diisi.',
            'signing.file' => 'Tanda tangan harus berupa file.',
            'signing.mimes' => 'Hanya file dengan ekstensi JPG, JPEG, atau PNG yang diperbolehkan.',
        ];
    }
}
