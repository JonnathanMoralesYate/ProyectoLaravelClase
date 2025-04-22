@extends('layouts.employee') 

@section('content')
<main>
<div class="container">
    <section>
        <h2>Actualizar usuario</h2>
            <form action="{{ route('actualizarUsuario', $usuario->idUsuario) }}" method="POST" class="form-registro">

                @csrf
                @method('PUT')

                <div class="campo">
                    <label for="idTipoDocum">Tipo de documento:</label>
                    <select name="idTipoDocum" required>
                        <option value="">Seleccione...</option>
                        @foreach ($tiposDocum as $tipoDocu)
                            <option value="{{ $tipoDocu->idTipoDocum }}" {{ $usuario->idTipoDocum == $tipoDocu->idTipoDocum ? 'selected' : '' }}>
                                {{ $tipoDocu->documento }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="campo">
                    <label for="numDocum">Numero Documento:</label>
                    <input type="text" name="numDocum" value="{{ $usuario->numDocum }}" required>
                </div>

                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>
                </div>

                <div class="campo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" value="{{ $usuario->apellido }}" required>
                </div>

                <div class="campo">
                    <label for="idTipoUsua">Tipo de usuario:</label>
                        <select name="idTipoUsua" required>
                            <option value="">Seleccione...</option>
                            @foreach ($tiposUsua as $tipoUsua)
                            <option value="{{ $tipoUsua->idTipoUsua }}" {{ $usuario->idTipoUsua == $tipoUsua->idTipoUsua ? 'selected' : '' }}>
                                {{ $tipoUsua->tipoUsuario }}
                            </option>
                        @endforeach
                        </select>
                </div>
    
                <div class="campo">
                    <!-- Se envía siempre -->
                    <input type="hidden" name="permiso" value="0">
                </div>

                <div class="campo">
                    <label for="email">Correo electrónico:</label>
                        <input type="email" name="email" value="{{ $usuario->email }}" required>
                </div>

                <div class="campo">
                    <label for="password">Contraseña:</label>
                    <input type="text" name="password">
                </div>

                <div class="text-center">
                    <button type="submit">Actualizar</button>
                </div>
            </form>
    </section>
</div>
</main>
@endsection