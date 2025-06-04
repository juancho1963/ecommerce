@extends('admin.layouts.app')

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9 mx-auto">
            <div class="row">
                <h3 class="p-4">Editar Color</h3>
                <hr>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="{{ route('admin.colors.update',$color->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="floatingInput" placeholder="Nombre del color"
                                value="{{$color->name, old('name')}}">
                              <label for="floatingInput">Nombre del color</label>
                              @error('name')
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
