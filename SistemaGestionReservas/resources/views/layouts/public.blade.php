<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Mi Descanso - Tu refugio ideal')</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/estiloInicio.css') }}">
</head>
<body>
  <header>
    <h1>Mi Descanso</h1>
    <p>Tu refugio ideal para relajarte y desconectar</p>
  </header>

  <nav>
        <a href="{{ route('inicio') }}">Inicio</a>
        <a href="{{ route('historia') }}">Historia</a>
        <a href="{{ route('nosotros') }}">Nosotros</a>
        <a href="{{ route('contacto') }}">Contacto</a>
        <!-- <a href="{{ route('admin.dashboard') }}">Panel de Administración</a> -->
        <!--<a href="{{ route('users.dashboard') }}">Panel de Cliente</a> -->
        <a href="{{ route('login') }}">Login</a>
  </nav>
  <div>
        @if (session('success'))
            <div id="mensaje-exito" data-mensaje="{{ session('success') }}"></div>
        @endif

        @if (session('error'))
            <div id="mensaje-error" data-mensaje="{{ session('error') }}"></div>
        @endif

        @if ($errors->any())
            <div id="errores-validacion" data-errores='@json($errors->all())' style="display: none;"></div>
        @endif
    </div>

  @yield('content')

  <!-- Aquí el modal genérico -->
<div class="modal fade" id="modalMensaje" tabindex="-1" aria-labelledby="modalMensajeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-info">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="modalMensajeLabel">Mensaje</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="modalMensajeContenido"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

  <footer>
    &copy; 2025 Mi Descanso. Todos los derechos reservados.
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/mensajeConfirmacionRegistros.js') }}"></script>
</body>
</html>
