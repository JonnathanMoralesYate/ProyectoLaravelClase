@extends('layout.nav')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-black mt-3">
                <h4>Eliminar Tipo Producto</h4>
            </div>

                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">idTipoProducto</th>
                                <th scope="col">nombre Tipo Producto</th>
                                <!-- <th scope="col">Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tipoProducto as $tipo)
                            <tr>
                                <td>{{$tipo->idTipoProducto}}</td>
                                <td>{{$tipo->nombreTipoProducto}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection