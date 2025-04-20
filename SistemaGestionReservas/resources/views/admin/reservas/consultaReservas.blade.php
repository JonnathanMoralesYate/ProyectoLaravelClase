@extends('layouts.admin') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estiloTable.css') }}">

@section('content')
    <main>
        <div class="container-fluid mt-5">
            <section>
                <h2>Consulta de reserva por Documento Cliente</h2>
                <form action="{{ route('consultaReservasNumDocum') }}" method="POST" class="form-busqueda">
                    @csrf
                    <div class="campo">
                        <label for="numDocum">Número de Documento:</label>
                        <input type="text" name="numDocum" id="numDocum" placeholder="Ingrese número de documento" required>
                    </div>
                    <button type="submit">Buscar</button>
                </form>
            </section>

        <div class="container-fluid mt-5">
            <section>
                <h2>Lista de Reservas</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>N° Documento Cliente</th>
                                    <th>N° Habitacion</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Estado</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                        <!-- Aquí irían los datos con Blade -->
                                @forelse($reservas as $reserva)
                                <tr>
                                    <td>{{ $reserva->idReserva }}</td>
                                    <td>{{ $reserva->usuario->numDocum }}</td>
                                    <td>{{ $reserva->habitacion->numero }}</td>
                                    <td>{{ $reserva->fechaInicio }}</td>
                                    <td>{{ $reserva->fechaFin }}</td>
                                    <td>{{ $reserva->estadoReserva->estado }}</td>
                                    <td>
                                        <form action="{{ route('eliminarReserva', $reserva->idReserva) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('vistaActualizarReserva', $reserva->idReserva) }}" class="btn btn-success"></a>
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