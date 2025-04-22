@extends('layouts.admin')

@section('title')

@section('content')
<main>
    <div class="container mt-5">
        <h2>Panel de administración</h2>
        <p>Bienvenido, administrador {{ auth()->user()->nombre }}</p>
    </div>
</main>
@endsection