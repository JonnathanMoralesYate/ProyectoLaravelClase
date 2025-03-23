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
            <form class=" mt-2" action="" method="post" enctype="multipart/form-data">
                <!--directiva Blade que genera un campo oculto en un formulario HTML con un token CSRF (Cross-Site Request Forgery).
                Este token se utiliza para proteger tu aplicación contra ataques CSRF, que son intentos maliciosos de enviar solicitudes
                no autorizadas desde un usuario autenticado a tu aplicación.-->
                @csrf
            <div class="mt-2">
                <label for="tipoProducto" class="form-label text-black mt-3">Nombre:</label>
                <input type="text" class="form-control" name="tipoproducto" required>
            </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-dark">Registrar Tipo Producto</button>
                </div>
            </form>
        </div>
    </div>
    <!--fin de seccion de contenido-->
    @endsection