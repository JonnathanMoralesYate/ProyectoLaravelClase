@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Actualizar Habitacion</h2>
        <form action="{{ route('actualizarHabitacion', $habitacion->idHabitacion) }}" method="POST" class="form-registro">

    @csrf
    @method('PUT')

    <div class="campo">
        <label for="numHabi">Numero Habitacion:</label>
        <input type="text" name="numHabi" value="{{ $habitacion->numero }}" required>
    </div>

    <div class="campo">
        <label for="idTipoHabi">Tipo de usuario:</label>
        <select name="idTipoHabi" required>
            <option value="">Seleccione...</option>
            @foreach ($tipoHabi as $tipoH)
                <option value="{{ $tipoH->idTipoHabi }}" {{ $habitacion->idTipoHabi == $tipoH->idTipoHabi ? 'selected' : ''}}>
                    {{ $tipoH->tipoHabi }}
                </option>
            @endforeach
        </select>
    </div>    

    <div class="campo">
        <label for="precio">Precio Habitacion:</label>
        <input type="precio" name="precio" value="{{ $habitacion->precio }}" required>
    </div>

    <div class="text-center">
        <button type="submit">Actualizar</button>
    </div>
</form>
    </section>
</div>
</main>
@endsection