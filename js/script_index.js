// SCRIPTS DE SHOW/HIDE PASSWORD

// Función para alternar la visibilidad de la contraseña del primer campo.
function togglePassword() {
    // Obtiene el campo de contraseña por su ID.
    var passwordField = document.getElementById("password");

    // Obtiene el icono de alternar contraseña del primer campo.
    var icon = document.querySelector(".toggle-password");

    // Comprueba si el tipo de campo de contraseña es "password".
    if (passwordField.type === "password") {
        // Si es "password", cambia el tipo a "text" para mostrar la contraseña.
        passwordField.type = "text";

        // Cambia el icono a "fa-eye-slash" para indicar que la contraseña es visible.
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        // Si el tipo es "text", cambia el tipo de campo de contraseña a "password" para ocultar la contraseña.
        passwordField.type = "password";

        // Cambia el icono a "fa-eye" para indicar que la contraseña está oculta.
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

// Función para alternar la visibilidad de la contraseña del segundo campo.
function togglePasswordTwo() {
    // Obtiene el campo de contraseña del segundo campo por su ID.
    var passwordField = document.getElementById("password-two");

    // Obtiene el icono de alternar contraseña del segundo campo.
    var icon = document.querySelector(".toggle-password-two");

    // Comprueba si el tipo de campo de contraseña es "password".
    if (passwordField.type === "password") {
        // Si es "password", cambia el tipo a "text" para mostrar la contraseña.
        passwordField.type = "text";

        // Cambia el icono a "fa-eye-slash" para indicar que la contraseña es visible.
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        // Si el tipo es "text", cambia el tipo de campo de contraseña a "password" para ocultar la contraseña.
        passwordField.type = "password";

        // Cambia el icono a "fa-eye" para indicar que la contraseña está oculta.
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
