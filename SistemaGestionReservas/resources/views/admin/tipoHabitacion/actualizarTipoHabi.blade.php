@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Actualizar Tipo de Habitacion</h2>
        <form action="{{ route('actualizarTipoHabi', $tipoHabi->idTipoHabi) }}" method="POST" class="form-registro">

            @csrf
            @method('PUT')

            <div class="campo">
                <label for="tipoHabi">Tipo de Habitacion:</label>
                <input type="text" name="tipoHabi" value="{{ $tipoHabi->tipoHabi }}" required>
            </div>

            <div class="text-center">
                <button type="submit">Actualizar</button>
            </div>
        </form>
    </section>
</div>
</main>
@endsection