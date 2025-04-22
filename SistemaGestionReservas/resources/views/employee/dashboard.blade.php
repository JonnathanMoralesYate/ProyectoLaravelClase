@extends('layouts.employee')

@section('title')

@section('content')
<main>
    <div class="container mt-5">
        <h2>Panel de Empleado</h2>
        <p>Bienvenido, empleado {{ auth()->user()->nombre }}</p>
    </div>
</main>
@endsection