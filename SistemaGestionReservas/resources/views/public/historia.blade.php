<title>Historia</title>

@extends('layouts.public')

@section('title', 'Nuestra Historia')

@section('content')
    <main>
        <div class="container mt-5">
            <img src="{{ asset('storage/imgInicio/hotel5.jpg') }}" alt="Hotel" class="img-historia">
        </div>
        <div class="container mt-5">
            <section>
                <h2>Nuestra Historia</h2>
                    <p>
                        Descanso nace del sueño de ofrecer un lugar acogedor y moderno donde las personas puedan encontrar tranquilidad y bienestar. Fundado en el corazón de un entorno natural, nuestro hotel combina la calidez del servicio personalizado con instalaciones cómodas y elegantes.
                    </p>
            </section>
        </div>
    </main>
@endsection