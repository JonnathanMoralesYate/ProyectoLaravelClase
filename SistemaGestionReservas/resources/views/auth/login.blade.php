@extends('layouts.public')

@section('title', 'login')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estiloLogin.css') }}">


@section('content')
    <!--seccion de contenido-->

<main>
    <form action="{{ route('iniciarSeccion') }}" method="POST" class="form-login">
        @csrf
        <div class="campo">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="campo">
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <button type="submit">Iniciar sesión</button>

        <p class="registro-link">
            ¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate aquí</a>
        </p>
    </form>
</main>

    <!--fin de seccion de contenido-->
    @endsection