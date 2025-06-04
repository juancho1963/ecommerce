@extends('admin.layouts.app')

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9 mx-auto">
            <div class="row">
                <h3 class="p-4">Editar Producto</h3>
                <hr>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="{{ route('admin.productos.update', $producto->slug)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3"><!-- Nombre -->
                              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="floatingInput" placeholder="Nombre del Producto"
                                value="{{$producto->name, old('name')}}">
                              <label for="floatingInput">Nombre del Producto</label>
                              @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-floating mb-3"><!-- Cantidad -->
                              <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty"
                                id="floatingInput" placeholder="Cantidad"
                                value="{{$producto->qty, old('qty')}}">
                              <label for="floatingInput">Cantidad</label>
                              @error('qty')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-floating mb-3"> <!-- Precio -->
                              <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                id="floatingInput" placeholder="Precio"p
                                value="{{$producto->price, old('price')}}">
                              <label for="floatingInput">Precio</label>
                              @error('price')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="mb-3"><!-- colores -->
                                <label for="color_id class="my-2">Selecciona los Colores</label>
                                <select name="color_id[]" id="color_id"
                                    class="form-control @error('color_id') is-invalid @enderror" multiple>
                                    @foreach($colors as $color)
                                        <option @if(collect(old('color_id'))->contains($color->id) ||
                                            $producto->colors->contains($color->id)
                                            ) selected @endif
                                        value="{{ $color->id }}">

                                        {{ $color->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('color_id')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3"><!-- Tamaño -->
                                <label for="size_id class="my-2">Selecciona los Tamaños</label>
                                <select name="size_id[]" id="size_id"
                                    class="form-control @error('size_id') is-invalid @enderror" multiple>
                                    @foreach($sizes as $size)
                                        <option @if(collect(old('size_id'))->contains($size->id) ||
                                            $producto->sizes->contains($size->id)
                                            ) selected @endif
                                        value="{{ $size->id }}">

                                        {{ $size->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('size_id')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3"> <!-- Descripcion -->
                              <label for="desc" class="my-2">Descripción</label>
                                <textarea row="10"
                                    class="form-control summernote
                                     @error('desc') is-invalid @enderror" name="desc"
                                     id="floatingInput" placeholder="Descripción">

                                    {{$producto->desc, old('desc') }}
                                </textarea>

                              @error('desc')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="mb-3"> <!-- thumbnail -->
                                <label for="thumbnail" class="my-2">Imagen para miniatura</label>
                                <input type="file" class="form-control
                                @error('thumbnail') is-invalid @enderror" name="thumbnail"
                                id="thumbnail">
                                @error('thumbnail')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-2"> <!--vista previa thombnail-->
                                <img src="{{ asset($producto->thumbnail) }}" id="thumbnail_preview"
                                class="@if(!$producto->thumbnail) d-none @endif
                                img-fluid rounded mb-2"
                                width="100"
                                heigh="100">
                            </div>
                            <div class="mb-3"> <!-- first_image -->
                                <label for="first_image" class="my-2">Primera Imagen</label>
                                <input type="file" class="form-control
                                @error('first_image') is-invalid @enderror" name="first_image"
                                id="first_image">

                                @error('first_image')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-2"> <!--vista previa first-->
                                <img src="{{ asset($producto->first_image) }}" id="first_image_preview"
                                class="@if(!$producto->first_image) d-none @endif
                                img-fluid rounded mb-2"
                                width="100"
                                heigh="100">
                            </div>
                            <div class="mb-3"> <!-- second_image -->
                                <label for="second_image" class="my-2">Segunda Imagen</label>
                                <input type="file" class="form-control
                                @error('second_image') is-invalid @enderror" name="second_image"
                                id="second_image">

                                @error('second_image')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-2"> <!--vista previa second-->
                                <img src="{{ asset($producto->second_image) }}" id="second_image_preview"
                                class="@if(!$producto->second_image) d-none @endif
                                img-fluid rounded mb-2"
                                width="100"
                                heigh="100">
                            </div>
                            <div class="mb-3"> <!-- third_image -->
                                <label for="third_image" class="my-2">Tercera Imagen</label>
                                <input type="file" class="form-control
                                @error('third_image') is-invalid @enderror" name="third_image"
                                id="third_image">

                                @error('third_image')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-2"> <!--vista previa third-->
                                <img src="{{ asset($producto->third_image) }}" id="third_image_preview"
                                class="@if(!$producto->third_image) d-none @endif  img-fluid rounded mb-2"
                                width="100"
                                heigh="100">
                            </div>

 <!--                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach -->

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
