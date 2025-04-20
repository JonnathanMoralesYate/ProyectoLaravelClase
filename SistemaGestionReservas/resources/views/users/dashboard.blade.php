@extends('layouts.user')

@section('title', 'Users') 

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection


@section('content')
<main>
    <div class="container mt-5">
        <h2>Panel de usuario</h2>
        <p>Bienvenido, Usuario.</p>
    </div>
</main>
@endsection