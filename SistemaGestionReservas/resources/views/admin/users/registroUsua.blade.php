@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Registrar usuario</h2>
        <form action="{{ route('registrarUsuario') }}" method="POST" class="form-registro">

    @csrf

    <div class="campo">
        <label for="idTipoDocum">Tipo de documento:</label>
        <select name="idTipoDocum" required>
            <option value="">Seleccione...</option>
            @foreach ($tiposDocum as $tipoDoc)
                <option value="{{ $tipoDoc->idTipoDocum }}">{{ $tipoDoc->documento }}</option>
            @endforeach
        </select>
    </div>

    <div class="campo">
        <label for="numDocum">Numero Documento:</label>
        <input type="text" name="numDocum" required>
    </div>

    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
    </div>

    <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
    </div>

    <div class="campo">
        <label for="idTipoUsua">Tipo de usuario:</label>
        <select name="idTipoUsua" required>
            <option value="">Seleccione...</option>
            @foreach ($tiposUsua as $tipoUsu)
                <option value="{{ $tipoUsu->idTipoUsua }}">{{ $tipoUsu->tipoUsuario }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="campo">
        <!-- Se envía siempre -->
        <input type="hidden" name="permiso" value="0">

        <label for="permiso">
            <input type="checkbox" name="permiso" id="permiso" value="1">
            ¿Tiene permiso?
        </label>
    </div>

    

    <div class="campo">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" required>
    </div>

    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="text" name="password" required>
    </div>

    <div class="text-center">
        <button type="submit">Registrar</button>
    </div>
</form>
    </section>
</div>
</main>
@endsection