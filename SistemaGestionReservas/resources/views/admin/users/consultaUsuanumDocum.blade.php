@extends('layouts.admin') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estiloTable.css') }}">
    

@section('content')
    <main>
        <div class="container-fluid mt-5">
            <section>
                <h2>Consulta de Usuario por Documento</h2>
                <form action="{{ route('consultaUsuaNumDocu') }}" method="POST" class="form-busqueda">
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
                <h2>Lista de Usuarios</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo Doc.</th>
                                    <th>N° Documento</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Tipo Usuario</th>
                                    <th>Permiso</th>
                                    <th>Email</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                        <!-- Aquí irían los datos con Blade -->
                                @forelse($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->idUsuario }}</td>
                                    <td>{{ $usuario->tipoDocumento->documento ?? 'Sin tipo' }}</td>
                                    <td>{{ $usuario->numDocum }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellido }}</td>
                                    <td>{{ $usuario->tipoUsuario->tipoUsuario ?? 'Sin Rol' }}</td>
                                    <td>{{ $usuario->permiso == 1 ? 'Activo' : 'Inactivo' }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <form action="{{ route('eliminarUsuario', $usuario->idUsuario) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('vistaActualizarUsua', $usuario->idUsuario) }}" class="btn btn-success"></a>
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