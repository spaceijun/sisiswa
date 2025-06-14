<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelaRequest extends FormRequest
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
            'nama_kelas' => 'required|string',
            'kelas_category_id' => 'required',
            'jumlah_siswa' => 'required',
            'guru_id' => 'nullable|exists:gurus,id',
        ];
    }
}
