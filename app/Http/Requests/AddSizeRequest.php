<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSizeRequest extends FormRequest
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
            'name' => 'required|max:255|unique:sizes',
        ];
    }
    // mesajes de error en reglas
    public function messages(): array {
        return [
            'name.required' => 'El campo nombre del tamaño es obligatorio',
            'name.max' => 'El nombre del tamaño no puede tener mas de 255 caracteres.',
            'name.requiered' => 'El nombre del del tamaño ya esta registrado.',
        ];
    }
}
