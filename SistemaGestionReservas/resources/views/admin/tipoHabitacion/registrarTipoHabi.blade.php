@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Registrar Tipo de Habitacion</h2>
        <form action="{{ route('registrarTipoHabi') }}" method="POST" class="form-registro">

            @csrf

            <div class="campo">
                <label for="tipoHabi">Tipo de Habitacion:</label>
                <input type="text" name="tipoHabi" required>
            </div>

            <div class="text-center">
                <button type="submit">Registrar</button>
            </div>
        </form>
    </section>
</div>
</main>
@endsection