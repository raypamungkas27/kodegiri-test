<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DocumentsUpdateApiR extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'tanggal_signing' => 'required',
            'jabatan_signing' => 'required',
            'nama_signing' => 'required',
            'signing' => 'file|mimes:jpg,jpeg,png,pdf',
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
            'signing.file' => 'Tanda tangan harus berupa file.',
            'signing.mimes' => 'Hanya file dengan ekstensi JPG, JPEG,PNG atau PDF yang diperbolehkan.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        // dd($validator->errors());
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
