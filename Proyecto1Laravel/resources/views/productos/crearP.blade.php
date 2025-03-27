<title>Registros de Productos</title>

<!--llama el archivo layout.vav.php-->
@extends('layout.nav')
<!---->
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-black mt-3">
                <h4>Registro  Productos</h4>
            </div>
            <!--    En lugar de escribir url('/crearP'), puedes llamarla en Blade así:
                    <a href="{{ route('crearP') }}">Ir a Crear Producto</a>            -->
                    
            <form class=" mt-2" action="/guardarProductos" method="POST" enctype="multipart/form-data">
                <!--directiva Blade que genera un campo oculto en un formulario HTML con un token CSRF (Cross-Site Request Forgery).
                Este token se utiliza para proteger tu aplicación contra ataques CSRF, que son intentos maliciosos de enviar solicitudes
                no autorizadas desde un usuario autenticado a tu aplicación.-->
                @csrf
                
            <div class="mt-2">
                <label for="nombreProducto" class="form-label text-black mt-3">Nombre:</label>
                <input type="text" class="form-control" name="nombreProducto" required>
            </div>
            <div class="mt-2">
                <label for="fotoProducto" class="form-label text-black mt-3">Foto:</label>
                <input type="file" class="form-control" name="fotoProducto" required>
            </div>
            <div class="mt-2">
                    <label for="idTipoProducto" class="form-label text-black mt-3">Tipo Producto:</label>
                    <select id="idTipoProducto" name="idTipoProducto" class="form-select" required>
                        <option value="Seleccione">
                            Seleccione...
                        </option>
                        @foreach($tipoProducto as $tipo)
                        <option value="{{$tipo->idTipoProducto}}">
                            {{$tipo->nombreTipoProducto}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-dark">Registrar Producto</button>
                </div>
            </form>
            <!-- Mensaje de confirmación de registro -->
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
    <!--fin de seccion de contenido-->
    @endsection



