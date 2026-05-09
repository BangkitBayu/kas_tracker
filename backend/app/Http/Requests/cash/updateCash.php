<?php

namespace App\Http\Requests\cash;

use App\Rules\not_zero;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class updateCash extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama wajib diisi',
            'nominal.required' => 'Nominal wajib diisi',
            'date.required' => 'Tanggal wajib diisi',
            'nominal.numeric' => 'Nominal invalid',
            'date.date' => 'Tanggal invalid'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required'],
            'nominal' => ['sometimes', 'required', 'numeric', new not_zero],
            'date' => ['sometimes', 'required', 'date']
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(response()->json(['message' => 'Invalid field', 'errors' => $validator->errors()], 422));
    }
}
