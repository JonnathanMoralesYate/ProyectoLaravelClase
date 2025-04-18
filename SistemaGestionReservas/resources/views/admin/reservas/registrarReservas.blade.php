@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Registrar Reserva</h2>
        <form action="{{ route('registrarReserva') }}" method="POST" class="form-registro">

    @csrf

    <div class="campo">
        <label for="numDocum">Numero Documento Cliente:</label>
        <input type="text" name="numDocum" required>
    </div>

    <div class="campo">
        <label for="idHabi">Numero Habitacion:</label>
        <input type="number" name="idHabi" required>
    </div>

    <div class="campo">
        <label for="fechaInc">Fecha Inicio:</label>
        <input type="date" name="fechaInicio" required>
    </div>

    <div class="campo">
        <label for="fechaFin">Fecha Fin:</label>
        <input type="date" name="fechaFin" required>
    </div>

    <div class="campo">
        <label for="idEstado">Estado Reserva:</label>
        <select name="idEstado" required>
            <option value="">Seleccione...</option>
            @foreach ($estadoR as $estado)
                <option value="{{$estado->idEstado }}">{{$estado->estado }}</option>
            @endforeach
        </select>

    <div class="text-center mt-3">
        <button type="submit">Registrar</button>
    </div>
</form>
    </section>
</div>
</main>
@endsection