<title>Nosotros</title>

@extends('layouts.public')

@section('title', 'Nosotros')

@section('content')
    <main>
        <div class="container mt-5">
            <img src="{{ asset('storage/imgInicio/hotel6.jpg') }}" alt="Hotel" class="img-historia">
        </div>
        <div class="container mt-5">
            <section>
                <h2>Misión</h2>
                    <p>
                        Brindar una experiencia de descanso única, con atención de calidad, confort y un entorno que promueve la relajación y el bienestar de cada huésped.
                    </p>
            </section>
        </div>
        <div class="container mt-5">
            <section>
                <h2>Visión</h2>
                    <p>
                        Ser reconocidos como el hotel boutique preferido por quienes buscan un escape perfecto, destacando por nuestro servicio excepcional y un ambiente armonioso.
                    </p>
            </section>
        </div>
    </main>
@endsection