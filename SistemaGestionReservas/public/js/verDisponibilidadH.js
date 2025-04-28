document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('consultarDisponibilidad').addEventListener('click', function () {
        const fechaInicio = document.getElementById('fechaInicioConsulta').value;
        const fechaFin = document.getElementById('fechaFinConsulta').value;

        if (!fechaInicio || !fechaFin) {
            alert('Por favor ingrese ambas fechas.');
            return;
        }

        fetch('/verDisponibilidadHabitaciones', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                fechaInicio: fechaInicio,
                fechaFin: fechaFin
            })
        })
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#modalDisponibilidad tbody');
            tbody.innerHTML = ''; // Limpiar la tabla

            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="3" class="text-center">No hay habitaciones disponibles.</td></tr>';
            } else {
                data.forEach(habitacion => {
                    const fila = `
                        <tr>
                            <td>${habitacion.numero}</td>
                            <td>${habitacion.tipoHabi}</td>
                            <td>$${habitacion.precio}</td>
                        </tr>
                    `;
                    tbody.innerHTML += fila;
                });
            }

            // Cerrar modal de fechas y abrir modal de disponibilidad
            var modalFechas = bootstrap.Modal.getInstance(document.getElementById('modalFechas'));
            modalFechas.hide();

            var modalDisponibilidad = new bootstrap.Modal(document.getElementById('modalDisponibilidad'));
            modalDisponibilidad.show();
        })
        .catch(error => {
            console.error('Error al consultar habitaciones:', error);
            alert('Hubo un error al consultar la disponibilidad.');
        });
    });
});
