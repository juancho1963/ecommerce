@extends('admin.layouts.app')

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9 mx-auto">
            <div class="row">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="p-4">Tamaño</h3>
                    <a href="{{ route('admin.sizes.create')}}" class="btn btn-sm btn-primary">
                        <i class="fan fa-plus"></i>
                    </a>
                </div>
<!--                 @session('success') se elimina para exibir la alarma
                    <div class="alert alert-success my-2">
                        {{ session('success')}}
                    </div>
                @endsession -->
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
                        @foreach ($sizes as $key =>$size)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td>{{ $size->name }}</td>
                            <td>
                                <a href="{{ route('admin.sizes.edit',$size->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="deleteItem({{ $size->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <form id="{{ $size->id}}" action="{{ route('admin.sizes.destroy', $size->id)}}" method="POST">
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
