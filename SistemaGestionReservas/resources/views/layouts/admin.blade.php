<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/estiloInicio.css') }}">
</head>
<body>
    <header>
        <h1>Mi Descanso</h1>
            <p>Tu refugio ideal para relajarte y desconectar</p>
    </header>

    <nav class="navbar-admin">
    <div class="menu-item">
        <a href="{{ route('admin.dashboard') }}">Inicio</a>
    </div>
    <div class="menu-item">
        <a href="#">Usuarios</a>
        <div class="submenu">
            <a href="{{ route('registroUsua') }}">Registrar Usuario</a>
            <a href="{{ route('consultaUsuaNumDocum') }}">Consulta Usuario</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Reservas</a>
        <div class="submenu">
            <a href="{{ route('registroReserva') }}">Registrar Reserva</a>
            <a href="{{ route('consultaReservas') }}">Consulta Reserva</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Habitaciones</a>
        <div class="submenu">
            <a href="{{ route('registroHabitacion') }}">Registrar Habitaciones</a>
            <a href="{{ route('consultaHabitacion') }}">Consulta Habitaciones</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Estado</a>
        <div class="submenu">
            <a href="{{ route('vistaRegistroEstadoR') }}">Registrar Estado Reserva</a>
            <a href="{{ route('consultaEstadoR') }}">Consulta Estado</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Tipo Habitación</a>
        <div class="submenu">
            <a href="{{ route('registroTipoHabi') }}">Registrar Tipo Habitacion</a>
            <a href="{{ route('consultaTipoHabi') }}">Consulta Tipo Habitacion</a>
        </div>
    </div>
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

    <!-- ... contenido de tu layout ... -->

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