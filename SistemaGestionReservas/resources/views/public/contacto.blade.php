<title>Contacto</title>

@extends('layouts.public')

@section('title', 'Contacto')

@section('content')
<main>
    <div class="container mt-5">
        <img src="{{ asset('storage/imgInicio/hotel7.jpg') }}" alt="Hotel" class="img-historia">
    </div>
    <div class="container mt-5">
        <section>
            <h2>Contacto</h2>
                <p><strong>Dirección:</strong> Calle del Descanso #123, Pueblo Tranquilo</p>
                <p><strong>Teléfono:</strong> +58 123-456-7890</p>
                <p><strong>Email:</strong> contacto@midescanso.com</p>
                <p><strong>Instagram:</strong> @hotel_midescanso</p>
        </section>
    </div>
</main>
@endsection