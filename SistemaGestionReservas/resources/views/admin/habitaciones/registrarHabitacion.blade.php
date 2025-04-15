@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Registrar Habitacion</h2>
        <form action="{{ route('registrarHabitacion') }}" method="POST" class="form-registro">

    @csrf

    <div class="campo">
        <label for="numHabi">Numero Habitacion:</label>
        <input type="text" name="numHabi" required>
    </div>

    <div class="campo">
        <label for="idTipoHabi">Tipo de usuario:</label>
        <select name="idTipoHabi" required>
            <option value="">Seleccione...</option>
            @foreach ($tipoHabi as $tipoH)
                <option value="{{ $tipoH->idTipoHabi }}">{{ $tipoH->tipoHabi }}</option>
            @endforeach
        </select>
    </div>    

    <div class="campo">
        <label for="precio">Precio Habitacion:</label>
        <input type="precio" name="precio" required>
    </div>

    <div class="text-center">
        <button type="submit">Registrar</button>
    </div>
</form>
    </section>
</div>
</main>
@endsection