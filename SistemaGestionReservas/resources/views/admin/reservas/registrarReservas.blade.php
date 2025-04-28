@extends('layouts.admin') 

@section('content')
<main>

<div class="container">
    <section>
        <h2>Registrar Reserva</h2>
        <form action="{{ route('registrarReserva') }}" method="POST" class="form-registro">

    @csrf

    <div class="campo">
        <label for="numDocum">Numero Documento Cliente:</label>
        <input type="text" name="numDocum" required>
    </div>

    <div class="campo">
        <label for="idHabi">Numero Habitacion:</label>
        <input type="number" name="idHabi" required>
    </div>

    <div class="campo">
        <label for="fechaInc">Fecha Inicio:</label>
        <input type="date" name="fechaInicio" required>
    </div>

    <div class="campo">
        <label for="fechaFin">Fecha Fin:</label>
        <input type="date" name="fechaFin" required>
    </div>

    <div class="campo">
        <label for="idEstado">Estado Reserva:</label>
        <select name="idEstado" required>
            <option value="">Seleccione...</option>
            @foreach ($estadoR as $estado)
                <option value="{{$estado->idEstado }}">{{$estado->estado }}</option>
            @endforeach
        </select>

    <div class="text-center mt-3">
        <button type="submit">Registrar</button>
    </div>
</form>

<div class="text-center mt-3">
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalFechas">
        Ver Disponibilidad Habitaciones
    </button>
</div>
</div>

<!-- Modal 1 para ingresar rango de fechas -->
<div class="modal fade" id="modalFechas" tabindex="-1" aria-labelledby="modalFechasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFechasLabel">Consultar Disponibilidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formFechas">
          <div class="mb-3">
            <label for="fechaInicioConsulta" class="form-label">Fecha Inicio:</label>
            <input type="date" class="form-control" id="fechaInicioConsulta" required>
          </div>
          <div class="mb-3">
            <label for="fechaFinConsulta" class="form-label">Fecha Fin:</label>
            <input type="date" class="form-control" id="fechaFinConsulta" required>
          </div>
          <div class="text-center">
            <button type="button" class="btn btn-primary" id="consultarDisponibilidad">Consultar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modalDisponibilidad" tabindex="-1" aria-labelledby="modalDisponibilidadLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDisponibilidadLabel">Disponibilidad de Habitaciones</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No. Habitación</th>
              <th>Tipo</th>
              <th>Precio X dia</th>
            </tr>
          </thead>
          <tbody>
          
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


    </section>
</div>
</main>
@endsection

@section('scripts')
<script src="{{ asset('js/verDisponibilidadH.js') }}"></script>