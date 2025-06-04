<?php

namespace App\Http\Controllers\Admin;

use App\Models\size;
use App\Http\Controllers\Controller;
use App\Http\requests\AddSizeRequest;
use App\Http\requests\UpdateSizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
      /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        return view('admin.sizes.index')->with([
            'sizes' => Size::latest()->get()
        ]);
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Almacenar un recurso recién creado en el almacenamiento.
     */
    public function store(AddSizeRequest $request)
    {
        if($request->validated());
        Size::create($request->validated());
        return redirect()->route('admin.sizes.index')->with([
            'success' => 'El tamaño se ha creado correctamente.'
        ]);
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(size $size)
    {
        abort(404);
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(size $size)
    {
        return view('admin.sizes.edit')->with([
            'size' => $size
        ]);
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     */
    public function update(UpdateSizeRequest $request, size $Size)
    {
        if($request->validated()){
            $Size->update($request->validated());
            return redirect()->route('admin.sizes.index')->with([
                'success' => 'El tamaño se ha actualizado correctamente.'
            ]);
        }
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     */
    public function destroy(Size $Size)
    {
        $Size->delete();
        return redirect()->route('admin.sizes.index')->with([
            'success' => 'El tamaño se ha eliminado correctamente.'
        ]);
    }
}
