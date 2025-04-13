@extends('layouts.admin') 

@section('content')
    <main>
        <div class="container-fluid mt-5">
            <section>
                <h2>Consulta de Tipo de Habitacion</h2>
                <form action="{{ route('consultaTipoHabiNombre') }}" method="POST" class="form-busqueda">
                    @csrf
                    <div class="campo">
                        <label for="tipoHabi">Nombre de Tipo de Habitacion:</label>
                        <input type="text" name="tipoHabi" id="tipoHabi" placeholder="Ingrese el nombre de tipo de habitacion" required>
                    </div>
                    <button type="submit">Buscar</button>
                </form>
            </section>

        <div class="container-fluid mt-5">
            <section>
                <h2>Lista de Tipos de Habitacion</h2>
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
                                @forelse($tiposHabi as $tipoHabitacion)
                                <tr>
                                    <td>{{ $tipoHabitacion->idTipoHabi }}</td>
                                    <td>{{ $tipoHabitacion->tipoHabi }}</td>
                                    <td>
                                        <form action="{{ route('eliminarTipoHabi', $tipoHabitacion->idTipoHabi) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('vistaActualizarTipoHabi', $tipoHabitacion->idTipoHabi) }}" class="btn btn-success"></a>
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