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
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tipoProducto as $tipo)
                            <tr>
                                <td>{{$tipo->idTipoProducto}}</td>
                                <td>{{$tipo->nombreTipoProducto}}</td>
                                <td><form action="{{ route('eliminarTipoProducto', $tipo->idTipoProducto) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </td>
                                </form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@if(session('mensaje'))
<div id="mensaje-alerta" class="alert alert-success">
                {{ session('mensaje') }}
                </div>

                <script>
                    setTimeout(function() {
                    var mensajeAlerta = document.getElementById('mensaje-alerta');
                        if (mensajeAlerta) {
                            mensajeAlerta.style.transition = "opacity 0.5s";
                            mensajeAlerta.style.opacity = "0";
                            setTimeout(() => mensajeAlerta.style.display = "none", 500);
                        }
                    }, 3000); // 3000 milisegundos = 3 segundos
                </script>
            @endif
        </div>
    </div>
@endsection