//console.log("✅ Script JS cargado correctamente");


//alert("JS ejecutado");

document.addEventListener('DOMContentLoaded', function () {
    const modalElement = document.getElementById('modalMensaje');
    const modalContenido = document.getElementById('modalMensajeContenido');
    const modalTitulo = document.getElementById('modalMensajeLabel');
    const modal = new bootstrap.Modal(modalElement);

    // Mensaje de éxito
    const successDiv = document.getElementById('mensaje-exito');
    if (successDiv) {
        modalTitulo.textContent = 'Éxito';
        modalElement.querySelector('.modal-header').classList.replace('bg-info', 'bg-success');
        modalContenido.textContent = successDiv.dataset.mensaje;
        modal.show();
    }

    // Mensaje de error
    const errorDiv = document.getElementById('mensaje-error');
    if (errorDiv) {
        modalTitulo.textContent = 'Error';
        modalElement.querySelector('.modal-header').classList.replace('bg-info', 'bg-danger');
        modalContenido.textContent = errorDiv.dataset.mensaje;
        modal.show();
    }

    // Errores de validación
    const erroresDiv = document.getElementById('errores-validacion');
    if (erroresDiv) {
        const errores = JSON.parse(erroresDiv.dataset.errores);
        const lista = '<ul>' + errores.map(e => `<li>${e}</li>`).join('') + '</ul>';

        modalTitulo.textContent = 'Errores de Validación';
        modalElement.querySelector('.modal-header').classList.replace('bg-info', 'bg-warning');
        modalContenido.innerHTML = lista;
        modal.show();
    }
});