<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthAdminRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ];
    }

    public function messages(): array
    {
        return[
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una direccion válida.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.max' => 'La contraseña no puede tener más de 255 caracteres.',
        ];
    }
}
