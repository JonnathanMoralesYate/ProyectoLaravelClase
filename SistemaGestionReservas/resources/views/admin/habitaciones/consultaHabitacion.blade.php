@extends('layouts.admin') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estiloTable.css') }}">

@section('content')
    <main>
        <div class="container-fluid mt-5">
            <section>
                <h2>Consulta de Usuario por Documento</h2>
                <form action="{{ route('consultaHabitacionNumHabi') }}" method="POST" class="form-busqueda">
                    @csrf
                    <div class="campo">
                        <label for="numHabi">Número de Habitacion:</label>
                        <input type="text" name="numHabi" id="numHabi" placeholder="Ingrese número de Habitacion" required>
                    </div>
                    <button type="submit">Buscar</button>
                </form>
            </section>

        <div class="container-fluid mt-5">
            <section>
                <h2>Lista de Habitaciones</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>N° Habitacion</th>
                                    <th>Tipo</th>
                                    <th>Precio</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                        <!-- Aquí irían los datos con Blade -->
                                @forelse($habitaciones as $habitacion)
                                <tr>
                                    <td>{{ $habitacion->idHabitacion }}</td>
                                    <td>{{ $habitacion->numero }}</td>
                                    <td>{{ $habitacion->tipoHabitacion->tipoHabi }}</td>
                                    <td>${{ number_format($habitacion->precio, 2, '.', ',') }}</td>
                                    <td>
                                        <form action="{{ route('eliminarHabitacion', $habitacion->idHabitacion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('vistaActualizarHabitacion', $habitacion->idHabitacion) }}" class="btn btn-success"></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No se encontraron resultados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
            </section>
        </div>
        </div>
    </main>
@endsection