<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloInicio.css') }}">
</head>
<body>
    <header>
        <h1>Mi Descanso</h1>
            <p>Tu refugio ideal para relajarte y desconectar</p>
    </header>

    <nav class="navbar-admin">
    <div class="menu-item">
        <a href="#">Inicio</a>
    </div>
    <div class="menu-item">
        <a href="#">Usuarios</a>
        <div class="submenu">
            <a href="{{ route('registroUsua') }}">Registrar Usuario</a>
            <a href="#">Actualizar Usuarios</a>
            <a href="#">Consulta Usuario</a>
            <a href="#">Lista de Usuarios</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Reservas</a>
        <div class="submenu">
            <a href="#">Registrar Reserva</a>
            <a href="#">Actualizar Reservas</a>
            <a href="#">Consulta Reserva</a>
            <a href="#">Lista de Reservas</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Habitaciones</a>
        <div class="submenu">
            <a href="#">Registrar Habitaciones</a>
            <a href="#">Actualizar Habitaciones</a>
            <a href="#">Consulta Habitaciones</a>
            <a href="#">Lista de Habitaciones</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Estado</a>
        <div class="submenu">
            <a href="#">Registrar Estado</a>
            <a href="#">Actualizar Estado</a>
            <a href="#">Consulta Estado</a>
            <a href="#">Lista de Estado</a>
        </div>
    </div>
    <div class="menu-item">
        <a href="#">Tipo Habitación</a>
        <div class="submenu">
            <a href="#">Registrar Tipo Habitacion</a>
            <a href="#">Actualizar Tipo Habitacion</a>
            <a href="#">Consulta Tipo Habitacion</a>
            <a href="#">Lista deTipo Habitacion</a>
        </div>
    </div>
</nav>

    @yield('content')

  <footer>
    &copy; 2025 Mi Descanso. Todos los derechos reservados.
  </footer>
</body>
</html>