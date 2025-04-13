@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Registrar Estado de Reserva</h2>
        <form action="{{ route('registrarEstadoR') }}" method="POST" class="form-registro">

            @csrf

            <div class="campo">
                <label for="estado">Estado Reserva:</label>
                <input type="text" name="estado" required>
            </div>

            <div class="text-center">
                <button type="submit">Registrar</button>
            </div>
        </form>
    </section>
</div>
</main>
@endsection