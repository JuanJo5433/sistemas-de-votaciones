
// Agregar un listener al botón para abrir la ventana.

document.getElementById('open-dialog-button').addEventListener('click', function () {

    if (document.querySelector('input[name="candidato"]:checked')) {
        openDialog();

    } else {
        alert('Por favor, seleccione un candidato antes de continuar.');
    }

});

document.getElementById('cancel-button').addEventListener('click', closeDialog);

function openDialog() {
    document.getElementById('dialog_state').checked = true;
}


function closeDialog() {
    document.getElementById('dialog_state').checked = false;
}
