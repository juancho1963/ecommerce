<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCouponRequest extends FormRequest
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
            'name' => 'required|max:255|unique:coupons',
            'discount' => 'required',
            'valid_until' => 'required',
        ];
    }
    // mesajes de error en reglas
    public function messages(): array {
        return [
            'name.required' => 'El campo nombre del cupon es obligatorio',
            'name.max' => 'El nombre del cupon no puede tener mas de 255 caracteres.',
            'name.requiered' => 'El nombre del del cupon ya esta registrado.',
            'discount.required' => 'El campo descuento del cupon es obligatorio',
            'valid_until.required' => 'El campo fecha de validez del cupon es obligatorio',
        ];
    }
}


