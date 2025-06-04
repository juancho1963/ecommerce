<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        return view('admin.colors.index')->with([
            'colors' => Color::latest()->get()
        ]);
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Almacenar un recurso recién creado en el almacenamiento.
     */
    public function store(AddColorRequest $request)
    {
        if($request->validated()){
            Color::create($request->validated());
            return redirect()->route('admin.colors.index')->with([
                'success' => 'El color se ha creado correctamente.'
            ]);
        }
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(color $color)
    {
        abort(404);
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(color $color)
    {
        return view('admin.colors.edit')->with([
            'color' => $color
        ]);
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     */
    public function update(updateColorRequest $request, color $color)
    {
        if($request->validated()){
            $color->update($request->validated());
            return redirect()->route('admin.colors.index')->with([
                'success' => 'El color se ha actualizado correctamente.'
            ]);
        }
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     */
    public function destroy(color $color)
    {
        $color->delete();
        return redirect()->route('admin.colors.index')->with([
            'success' => 'El color se ha eliminado correctamente.'
        ]);
    }
}
