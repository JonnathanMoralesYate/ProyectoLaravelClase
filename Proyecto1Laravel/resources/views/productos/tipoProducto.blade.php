<title>Registros Tpos de Productos</title>

<!--llama el archivo layout.vav.php-->
@extends('layout.nav')
<!---->
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-black mt-3">
                <h4>Registro Tipo de Productos</h4>
            </div>
            <form class=" mt-2" action="/guardarTipoP" method="post" enctype="multipart/form-data">
                <!--directiva Blade que genera un campo oculto en un formulario HTML con un token CSRF (Cross-Site Request Forgery).
                Este token se utiliza para proteger tu aplicación contra ataques CSRF, que son intentos maliciosos de enviar solicitudes
                no autorizadas desde un usuario autenticado a tu aplicación.-->
                @csrf
            <div class="mt-2">
                <label for="nombreTipoProducto" class="form-label text-black mt-3">Nombre:</label>
                <input type="text" class="form-control" name="nombreTipoProducto" required>
            </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-dark">Registrar Tipo Producto</button>
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