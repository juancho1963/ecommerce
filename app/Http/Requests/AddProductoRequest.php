<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductoRequest extends FormRequest
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
            'name' => 'required|max:255|unique:productos',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'color_id'=> 'required',
            'size_id'=> 'required',
            'desc'=> 'required|max:2000',
            'thumbnail'=> 'required|image|mimes:png,jpg,jpeg|max:2048',
            'first_image'=> 'image|mimes:png,jpg,jpeg|max:2048',
            'second_image'=> 'image|mimes:png,jpg,jpeg|max:2048',
            'third_image'=> 'image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre del producto es obligatorio.',
            'name.max' => 'El nombre del producto no puede tener mas de 255 caracteres.',
            'name.unique' => 'El nombre del producto ya esta registrado.',

            'qty.required' => 'El campo cantidad es obligatorio.',
            'qty.numeric' => 'La cantidad debe ser un numero.',

            'price.required' => 'El campo precio es obligatorio.',
            'price.numeric' => 'La cantidad debe ser un numero.',

            'color_id.required'=> 'El campo color es obligatorio.',
            'size_id.required'=> 'El campo tamano es obligatorio.',

            'desc.required'=> 'El campo descripcion es obligatorio.',
            'desc.max'=> 'La descripcion no puede tener mas de 2000 caracteres.',

            'thumbnail.required'=> 'La imagen de la miniatura es obligatoria. llllr request',
            'thumbnail.image'=> 'La imagen de la miniatura debe de ser una imagen.',
            'thumbnail.mimes'=> 'La imagen de la miniatura debe de ser un archivo de tipo: png,jpg,jpeg.',
            'thumbnail.max'=> 'La imagen de la miniatura no puede excedeer los 2MB.',

            'first_image.image'=> 'La primera imagen debe de ser una imagen.',
            'first_image.mimes'=> 'La primera imagen debe de ser un archivo de tipo: png,jpg,jpeg.',
            'first_image.max'=> 'La primera imagen no puede excedeer los 2MB.',

            'second_image.image'=> 'La segunda imagen debe de ser una imagen.',
            'second_image.mimes'=> 'La segunda imagen debe de ser un archivo de tipo: png,jpg,jpeg.',
            'second_image.max'=> 'La segunda imagen no puede excedeer los 2MB.',

            'third_image.image'=> 'La tercera imagen debe de ser una imagen.',
            'third_image.mimes'=> 'La tercera imagen debe de ser un archivo de tipo: png,jpg,jpeg.',
            'third_image.max'=> 'La tercera imagen no puede excedeer los 2MB.',
        ];
    }
}
