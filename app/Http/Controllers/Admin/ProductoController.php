<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductoRequest;
use App\Http\Requests\updateProductoRequest;
use App\Models\producto;
use App\Models\color;
use App\Models\size;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
      /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        return view('admin.productos.index')->with([
            'productos' => Producto::with(['colors','sizes'])->latest()->get()
        ]);
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.productos.create')->with([
            'colors'=> $colors,
            'sizes'=> $sizes,
        ]);
    }

    /**
     * Almacenar un recurso recién creado en el almacenamiento.
     */
    public function store(AddProductoRequest $request)
    {
            //$datosProduct = $request->all();
            //return response()-> json($datosProduct);

            if($request->validated()){
                $data = $request->all();
                $data['thumbnail'] = $this->saveImage($request->file('thumbnail'));

                if($request->has('first_image')){
                    $data['first_image'] = $this->saveImage($request->file('first_image'));
                }

                if($request->has('second_image')){
                    $data['second_image'] = $this->saveImage($request->file('second_image'));
                }

                if($request->has('third_image')){
                    $data['third_image'] = $this->saveImage($request->file('third_image'));
                }

                $data['slug'] = Str::slug($request->name);

                $producto = Producto::create($data);
                $producto->colors()->sync($request->color_id);
                $producto->sizes()->sync($request->size_id);

                return redirect()->route('admin.productos.index')->with([
                'success' => 'El producto se ha creado correctamente.'
                ]);
            }


    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Producto $producto)
    {
        abort(404);
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Producto $producto)
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.productos.edit')->with([
            'colors'=> $colors,
            'sizes'=> $sizes,
            'producto'=> $producto
        ]);
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        if($request->validated()){
            $data = $request->all();

            if ($request->has('thumbnail')){
                $this->removeProductoImageFromStorage($request->File('thumbnail'));
                $data['thumbnail'] = $this->saveImage($request->file('thumbnail'));
            }

            if($request->has('first_image')){
                $this->removeProductoImageFromStorage($request->File('first_image'));
                $data['first_image'] = $this->saveImage($request->file('first_image'));
            }

            if($request->has('second_image')){
                $this->removeProductoImageFromStorage($request->File('second_image'));
                $data['second_image'] = $this->saveImage($request->file('second_image'));
            }

            if($request->has('third_image')){
                $this->removeProductoImageFromStorage($request->File('third_image'));
                $data['third_image'] = $this->saveImage($request->file('third_image'));
            }

            $data['slug'] = Str::slug($request->name);

            $producto->update($data);
            $producto->colors()->sync($request->color_id);
            $producto->sizes()->sync($request->size_id);

            return redirect()->route('admin.productos.index')->with([
            'success' => 'El producto se ha actualizado correctamente.'
            ]);
        }
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     */
    public function destroy(Producto $producto)
    {
        $this->removeProductoImageFromStorage($producto->thumbnail);
        $this->removeProductoImageFromStorage($producto->first_image);
        $this->removeProductoImageFromStorage($producto->second_image);
        $this->removeProductoImageFromStorage($producto->third_image);

        $producto->delete();
        return redirect()->route('admin.productos.index')->with([
            'success' => 'El producto se ha eliminado correctamente.'
        ]);
    }

    public function saveImage($file) {
        $image_name = time().'_'.$file->getClientOriginalName();
        $file->storeAs('images/productos/', $image_name, 'public');
        return 'storage/images/productos/'.$image_name;
    }

    Public function removeProductoImageFromStorage($file) {
        $path = public_path('storage/images/productos'.$file);
        if (File::exists($path)) {
            File::delete($path);
        }
    }

}

