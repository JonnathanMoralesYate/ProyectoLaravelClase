@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Registrar Reserva</h2>
        <form action="{{ route('actualizarReserva', $reserva->idReserva) }}" method="POST" class="form-registro">

    @csrf
    @method('PUT')

    <div class="campo">
        <label for="numDocum">Numero Documento Cliente:</label>
        <input type="text" name="numDocum" value="{{ $reserva->usuario->numDocum }}" required>
    </div>

    <div class="campo">
        <label for="idHabi">Numero Habitacion:</label>
        <input type="number" name="idHabi" value="{{ $reserva->idHabitacion }}" required>
    </div>

    <div class="campo">
        <label for="fechaInc">Fecha Inicio:</label>
        <input type="date" name="fechaInicio" value="{{ $reserva->fechaInicio }}" required>
    </div>

    <div class="campo">
        <label for="fechaFin">Fecha Fin:</label>
        <input type="date" name="fechaFin" value="{{ $reserva->fechaFin }}" required>
    </div>

    <div class="campo">
        <label for="idEstado">Estado Reserva:</label>
        <select name="idEstado" required>
            <option value="">Seleccione...</option>
            @foreach ($estadoR as $estado)
                <option value="{{$estado->idEstado }}" {{ $reserva->idEstado == $estado->idEstado ? 'selected' : '' }}>{{$estado->estado }}</option>
            @endforeach
        </select>

    <div class="text-center mt-3">
        <button type="submit">Actualizar</button>
    </div>
</form>
    </section>
</div>
</main>
@endsection