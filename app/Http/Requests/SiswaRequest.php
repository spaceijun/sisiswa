<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'kelas_id' => 'required',
            'user_id' => 'required|exists:users,id',
            'nama_siswa' => 'required|string',
            'nis' => 'required|numeric',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'telephone' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'penilaian' => 'nullable|numeric',
        ];
    }
}
