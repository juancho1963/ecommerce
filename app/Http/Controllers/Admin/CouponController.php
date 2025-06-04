<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
      /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        return view('admin.coupons.index')->with([
            'coupons' => Coupon::latest()->get()
        ]);
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Almacenar un recurso recién creado en el almacenamiento.
     */
    public function store(AddCouponRequest $request)
    {
        if($request->validated());
        Coupon::create($request->validated());
        return redirect()->route('admin.coupons.index')->with([
            'success' => 'El Cupon se ha creado correctamente.'
        ]);
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Coupon $coupon)
    {
        abort(404);
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit')->with([
            'coupon' => $coupon
        ]);
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        if($request->validated()){
            $coupon->update($request->validated());
            return redirect()->route('admin.coupons.index')->with([
                'success' => 'El cupon se ha actualizado correctamente.'
            ]);
        }
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with([
            'success' => 'El cupon se ha eliminado correctamente.'
        ]);
    }
}
