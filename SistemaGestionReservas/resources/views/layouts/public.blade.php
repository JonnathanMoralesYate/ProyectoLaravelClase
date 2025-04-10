<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mi Descanso - Tu refugio ideal</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
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
        <a href="{{ route('admin.dashboard') }}">Panel de Administración</a>
        <!-- <a href="">Login</a> -->
  </nav>

  @yield('content')

  <footer>
    &copy; 2025 Mi Descanso. Todos los derechos reservados.
  </footer>
</body>
</html>
