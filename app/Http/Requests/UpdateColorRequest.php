<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
  public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtenga las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:colors,name,'.$this->color->id,
        ];
    }
    // mesajes de error en reglas
    public function messages(): array
    {
        return [
            'name.requiered' => 'El campo nombre del color es obligatorio',
            'name.max' => 'El nombre del color no puede tener mas de 255 caracteres.',
            'name.requiered' => 'El nombre del del color ya esta registrado.',
        ];
    }
}
