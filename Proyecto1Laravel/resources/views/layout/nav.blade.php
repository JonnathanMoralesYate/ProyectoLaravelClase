<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="/img/logoPesta.ico" type="image/x-icon">
    <title>Modulo Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
        /* Asegura que el contenido principal ocupe toda la altura de la pantalla */
        html, body {
            height: 100%;
            margin: 0;
        }

        .content {
            min-height: 100%; /* Hace que el contenido ocupe al menos el 100% de la altura */
            padding-bottom: 60px; /* Ajusta el espacio para el footer */
        }

        /* Estilo para el footer */
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        /*quitar el hover de barra de navegacion*/
        .navbar-nav .dropdown-item {
            transition: none !important; /* Elimina transiciones */
            background-color: transparent !important; /* Evita cambios de color */
        }

        .navbar-nav .dropdown-item:hover {
            background-color: transparent !important;
            color: inherit !important; /* Mantiene el color original del texto */
            text-decoration: none !important;
    } 

    .navbar-nav .dropdown-item {
        color: white !important; /* Asegura que el texto sea blanco */
    }

    .navbar-nav .dropdown-item:hover {
        background-color: transparent !important; /* Evita cambios de fondo */
        color: white !important; /* Mantiene el texto en blanco */
        text-decoration: none !important; /* Evita subrayados */
    }
    </style>

<body>
    <div class="container-fluid">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <!-- Botón para menú en móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenedor del menú -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <!-- Logo e inicio -->                   

                    <!-- Menú de navegación -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li><a class="dropdown-item text-white" href="/">Inicio</a></li>
                        <!-- Productos -->
                        <li><a class="dropdown-item text-white" href="{{ route('crearP') }}">Crear Producto</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('tipoProducto') }}">Insert Tipo Productos</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('listaP') }}">Lista Productos</a></li>
                    </ul>        
                </div>
            </div>
        </nav>

        

    <!-- Sección de contenido -->
    @yield('content')

    <!-- Pie de página -->
    <footer class="bg-dark text-center text-white py-4">
            <p>© 2024 - VariedadesJyk® / Minimarket Variedades S.A.S. NIT. 110.370.428-1 - Todos los Derechos Reservados.</p>
        </footer>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>