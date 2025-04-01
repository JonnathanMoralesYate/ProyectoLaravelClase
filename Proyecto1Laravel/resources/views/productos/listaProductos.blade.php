

<!--Inicio para mostrar datos para buscar y consultar-->
@extends('layout.nav')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-black mt-3">
                <h4>Productos</h4>
            </div>

                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">idProducto</th>
                                <th scope="col">nombreProducto</th>
                                <th scope="col">fotoProducto</th>
                                <th scope="col">tipoProducto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->idProducto }}</td>
                                <td>{{ $producto->nombreProducto }}</td>
                                <td><img src="{{ asset('storage/productos/'.$producto->fotoProducto) }}" width="50" alt=""></td>
                                <td>{{ $producto->tipoProducto->nombreTipoProducto }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection