@extends('admin.layouts.app')

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9 mx-auto">
            <div class="row">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="p-4">Colores index</h3>
                    <a href="{{ route('admin.colors.create')}}" class="btn btn-sm btn-primary">
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
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $key => $color)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td>{{ $color->name }}</td>
                            <td>
                                <a href="{{ route('admin.colors.edit',$color->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="deleteItem({{ $color->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <form id="{{ $color->id}}" action="{{ route('admin.colors.destroy', $color->id)}}" method="POST">
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
