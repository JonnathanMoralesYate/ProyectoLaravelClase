<!--llama el archivo layout.vav.php-->
@extends('layouts.public')

@section('title')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estiloCarousel.css') }}">

@section('content')
    <!--seccion de contenido-->

<main>
    <div class="carousel">
        <div class="carousel-track">
            <div class="carousel-slide">
                <img src="{{ asset('storage/imgInicio/hotel1.jpg') }}" alt="Hotel" class="imagen-hotel">
            </div>
            <div class="carousel-slide">
                <img src="{{ asset('storage/imgInicio/hotel2.jpg') }}" alt="Hotel" class="imagen-hotel">
            </div>
            <div class="carousel-slide">
                <img src="{{ asset('storage/imgInicio/hotel3.jpg') }}" alt="Hotel" class="imagen-hotel">
            </div>
            <div class="carousel-slide">
                <img src="{{ asset('storage/imgInicio/hotel4.jpg') }}" alt="Hotel" class="imagen-hotel">
            </div>
        </div>
    </div>


    <div class="container mt-5">
    <section>
        <h2>Nuestros Servicios</h2>
            <p>
                En <strong>Hotel Mi Descanso</strong> nos especializamos en ofrecerte una experiencia única de tranquilidad, comodidad y excelente atención. Cada rincón ha sido diseñado pensando en tu descanso y bienestar.
            </p>

        <h3>🌟 ¿Por qué elegirnos?</h3>
            <ul>
                <li>🛏️ <strong>Habitaciones confortables:</strong> camas amplias, aire acondicionado, wifi gratuito y todo lo necesario para una estadía placentera.</li>
                <li>🤝 <strong>Atención personalizada:</strong> amable, cercana y siempre dispuesta a ayudarte en lo que necesites.</li>
                <li>🌿 <strong>Ambiente tranquilo:</strong> perfecto para relajarte, desconectar del estrés y recargar energías.</li>
                <li>💸 <strong>Las mejores ofertas:</strong> tarifas accesibles durante todo el año sin comprometer la calidad ni el servicio.</li>
                <li>🧼 <strong>Limpieza impecable:</strong> cuidamos cada detalle para garantizar tu comodidad y seguridad.</li>
            </ul>

        <p>
            Ya sea que viajes por trabajo, turismo o simplemente para descansar, en <strong>Mi Descanso</strong> te recibimos con los brazos abiertos para que te sientas incluso mejor que en casa.
        </p>

        <p><strong>¡Haz tu reserva hoy y vive la experiencia de descansar como nunca antes!</strong></p>
    </section>
    </div>
  </main>

    <!--fin de seccion de contenido-->
    @endsection