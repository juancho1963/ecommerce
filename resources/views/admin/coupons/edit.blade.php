@extends('admin.layouts.app')

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9 mx-auto">
            <div class="row">
                <h3 class="p-4">Editar Cupon</h3>
                <hr>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="{{ route('admin.coupons.update',$coupon->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="floatingInput" placeholder="Cupon"
                                value="{{ $coupon->name, old('name')}}">
                              <label for="floatingInput">Cupon</label>
                              @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <input type="number" class="form-control @error('discount') is-invalid @enderror" name="discount"
                                id="floatingInput" placeholder="Descuento"
                                value="{{ $coupon->discount, old('discount')}}">
                              <label for="floatingInput">Descuento</label>
                              @error('discount')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <input type="datetime-local" class="form-control @error('valid_until') is-invalid @enderror" name="valid_until"
                                id="floatingInput" placeholder="Fecha de validez"
                                value="{{ $coupon->valid_until }}">
                              <label for="floatingInput">Fecha de validez</label>
                              @error('valid_until')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>




                            <div class="mb-2">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
