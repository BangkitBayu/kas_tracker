<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class registerRequest extends FormRequest
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
            'fullname' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'school' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['confirmed:password']
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'fullname.required' => 'Nama lengkap wajib diisi',
            'username.required' => 'Nama pengguna wajib diisi',
            'school.required' => 'Asal sekolah wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email invalid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'confirm_password' => 'Konfirmasi password tidak cocok'
        ];
    }

    #[Override]
    public function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(response()->json(['message' => 'Invalid field', 'errors' => $validator->errors()], 422));
    }
}
