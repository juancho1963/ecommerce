@extends('admin.layouts.app')

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9 mx-auto">
            <div class="row">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="p-4">Productos</h3>
                    <a href="{{ route('admin.productos.create')}}" class="btn btn-sm btn-primary">
                        <i class="fan fa-plus"></i>
                    </a>
                </div>

                <hr>
            </div>
            <div class="card-body">
                <table class="table">
                     <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Colores</th>
                            <th scope="col">Tamaños</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Imágenes</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $key =>$producto)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td>{{ $producto->name }}</td>
                            <td>
                                @foreach ($producto->colors as $color)
                                    <span class="badge bg-light text-dark">
                                        {{ $color->name}}
                                    </span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($producto->sizes as $size)
                                    <span class="badge bg-light text-dark">
                                        {{ $size->name}}
                                    </span>
                                @endforeach
                            </td>
                            <td>{{ $producto->qty }}</td>
                            <td>{{ $producto->price }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <img src="{{ asset($producto->thumbnail) }}" alt="{{ $producto->name}}"
                                        class="img-fluid rounded mb-1 border border-muted"
                                        width="30" height="30">

                                    @if($producto->first_image)
                                    <img src="{{ asset($producto->first_image) }}" alt="{{ $producto->name}}"
                                        class="img-fluid rounded mb-1"
                                        width="30" height="30">
                                    @endif

                                    @if($producto->second_image)
                                    <img src="{{ asset($producto->second_image) }}" alt="{{ $producto->name}}"
                                        class="img-fluid rounded mb-1"
                                        width="30" height="30">
                                    @endif

                                    @if($producto->third_image)
                                    <img src="{{ asset($producto->third_image) }}" alt="{{ $producto->name}}"
                                        class="img-fluid rounded mb-1"
                                        width="30" height="30">
                                    @endif

                                </div>
                            </td>
                            <td>
                                @if ($producto->status)
                                    <span class="badge bg-success p-2">
                                        En stock
                                    </span>
                                @else
                                    <span class="badge bg-danger p-2">
                                        Sin stock
                                    </span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.productos.edit',$producto->slug) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="deleteItem({{ $producto->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <form id="{{ $producto->id}}"
                                    action="{{ route('admin.productos.destroy', $producto->slug)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
