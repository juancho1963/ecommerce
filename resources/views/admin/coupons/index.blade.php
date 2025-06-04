@extends('admin.layouts.app')

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9 mx-auto">
            <div class="row">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="p-4">Cupones</h3>
                    <a href="{{ route('admin.coupons.create')}}" class="btn btn-sm btn-primary">
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
                            <th scope="col">Descuento</th>
                            <th scope="col">Valides</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $key =>$coupon)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td>{{ $coupon->name }}</td>
                            <td>{{ $coupon->discount }}</td>
                            <td>
                                @if($coupon->checkIfValid())
                                    <span class="bg-success p-1 text-white">
                                    Caduca {{ \Carbon\carbon::parse($coupon->valid_until)->diffForHumans() }}
                                    </span>
                                @else
                                    <span class="bg-danger p-1 text-white">
                                        Caducado
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.coupons.edit',$coupon->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="deleteItem({{ $coupon->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <form id="{{ $coupon->id}}" action="{{ route('admin.coupons.destroy', $coupon->id)}}" method="POST">
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
