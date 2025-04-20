@extends('layouts.admin') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estiloTable.css') }}">

@section('content')
    <main>
        <div class="container-fluid mt-5">
            <section>
                <h2>Consulta de Tipo de Habitacion</h2>
                <form action="{{ route('consultaEstadoRNombre') }}" method="POST" class="form-busqueda">
                    @csrf
                    <div class="campo">
                        <label for="estado">Nombre de Estado de Reserva:</label>
                        <input type="text" name="estado" id="estado" placeholder="Ingrese el nombre del estado" required>
                    </div>
                    <button type="submit">Buscar</button>
                </form>
            </section>

        <div class="container-fluid mt-5">
            <section>
                <h2>Lista de Estados de Reserva</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                        <!-- Aquí irían los datos con Blade -->
                                @forelse($estadoRes as $estadoR)
                                <tr>
                                    <td>{{ $estadoR->idEstado }}</td>
                                    <td>{{ $estadoR->estado }}</td>
                                    <td>
                                        <form action="{{ route('eliminarEstadoR', $estadoR->idEstado ) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('vistaActualizarEstadoR', $estadoR->idEstado) }}" class="btn btn-success"></a>
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