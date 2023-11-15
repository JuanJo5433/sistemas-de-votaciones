<?php
session_start();

include("conexion.php");
$conectar = connection();

// Validar el formulario al enviarlo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['documento'], $_POST['email'], $_POST['new_password'])) {
        // Verificar token Anti-CSRF (aún no implementado en el código proporcionado)
        $documento = $_POST['documento'];
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];

        // Verificar que el correo y el documento coincidan con los de la base de datos
        $verificar_usuario = "SELECT * FROM usuarios WHERE email = ? AND documento = ?";
        $stmt_verificar = $conectar->prepare($verificar_usuario);
        $stmt_verificar->bind_param("ss", $email, $documento);
        $stmt_verificar->execute();
        $result = $stmt_verificar->get_result();

        if ($result->num_rows == 0) {
            // Los datos proporcionados no coinciden con los registros en la base de datos
            header("Location: ../index_login.php?message=invalid_data");
            exit();
        }

        // Validar la contraseña en el servidor
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{7,}$/';
        if (!preg_match($regex, $new_password)) {
            header("Location: ../change_password.php?documento=$documento&message=password_error");
            exit();
        }

        // Encriptar la nueva contraseña
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Actualizar la contraseña en la base de datos
        $query = "UPDATE usuarios SET password = ? WHERE email = ? AND documento = ?";
        $stmt = $conectar->prepare($query);
        $stmt->bind_param("sss", $hashed_password, $email, $documento);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: ../index_login.php?message=success_password");
            exit();
        } else {
            header("Location: ../index_login.php?message=error");
            exit();
        }
    } else {
        header("Location: ../index_login.php?message=missing_data");
        exit();
    }
}

// Cerrar la conexión a la base de datos
$conectar->close();
?>
