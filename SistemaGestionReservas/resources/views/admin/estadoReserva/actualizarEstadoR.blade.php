@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Actualizar estado de Reserva</h2>
        <form action="{{ route('actualizarEstadoR', $estadoR->idEstado) }}" method="POST" class="form-registro">

            @csrf
            @method('PUT')

            <div class="campo">
                <label for="estado">Estado Reserva:</label>
                <input type="text" name="estado" value="{{ $estadoR->estado }}" required>
            </div>

            <div class="text-center">
                <button type="submit">Registrar</button>
            </div>
        </form>
    </section>
</div>
</main>
@endsection