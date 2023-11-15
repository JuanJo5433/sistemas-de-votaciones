<?php

// Inicia el bufer de salida para evitar problemas con las cabeceras HTTP.

ob_start(); 


// Configuracion de la conexion MySQL.

include("../config/conexion.php"); 
$conectar = connection(); // Llama a la función de conexión y almacena la conexión en la variable $conectar.


// Inicia o reanuda la sesión.

session_start(); 

$user = $_POST['documento']; // Obtiene el valor del campo 'documento' del formulario POST.
$contrasena = $_POST["password"]; // Obtiene el valor del campo 'password' del formulario POST.


// Utiliza una sola consulta preparada para obtener todos los datos del usuario.

$consulta = "SELECT documento, password, nombres_apellidos, tipo_documento, documento, voto_alcalde, voto_gobernador, voto_jac, voto_representante_sena, rol FROM usuarios WHERE documento = ?";


// Prepara la consulta SQL en la conexión.

$stmt = mysqli_prepare($conectar, $consulta); 

mysqli_stmt_bind_param($stmt, "s", $user); // Asocia el valor del marcador de posición '?' en la consulta.
mysqli_stmt_execute($stmt); // Ejecuta la consulta preparada.
mysqli_stmt_store_result($stmt); // Almacena el resultado en el statement.


// Se verifica si se encontró al menos una fila en el resultado.

if (mysqli_stmt_num_rows($stmt) > 0) { 

    // Vincula las columnas necesarias del resultado a variables

    mysqli_stmt_bind_result($stmt, $db_user, $db_password,$nombres_apellidos, $tipo_documento, $documento, $voto_alcalde, $voto_gobernador, $voto_jac, $voto_representante_sena, $rol); 
    mysqli_stmt_fetch($stmt); // Obtiene el resultado de la consulta


    // Verifica la contraseña con password_verify.
    // Compara la contraseña proporcionada, con la contraseña almacenada en la base de datos.

    if (password_verify($contrasena, $db_password)) { 

        $_SESSION["user"] = $db_user; // Almacena el nombre de usuario en la sesión.
        $_SESSION["nombres_apellidos"] = $nombres_apellidos; // Almacena los nombres y apellidos en la sesion.
        $_SESSION["tipo_documento"] = $tipo_documento; // Almacena el tipo de documento en la sesión.
        $_SESSION["documento"] = $documento; // Almacena el numero de documento en la sesion.
        $_SESSION["voto_alcalde"] = $voto_alcalde; // Almacena el voto para el alcalde en la sesión.
        $_SESSION["voto_gobernador"] = $voto_gobernador; // Almacena el voto para el gobernador en la sesión.
        $_SESSION["voto_jac"] = $voto_jac; // Almacena el voto para el JAC en la sesión.
        $_SESSION["voto_representante_sena"] = $voto_representante_sena; // Almacena el voto para el representante del SENA en la sesión.
        $_SESSION["rol"] = $rol;
        // Redirige a la página de votaciones si la contraseña es correcta.

        header("Location: ../votaciones/index_admin.php"); 
    
    // Mensaje de alerta si la contraseña es incorrecta, ademas redirige al login.

    } else {
        echo '<script type="text/javascript">
            alert("CONTRASEÑA INCORRECTA");
            window.location.href="../index_login.php";
            </script>';
    }

// Mensaje de alerta si el usuario es incorrecto, ademas redirige al login.

} else {
    echo '<script type="text/javascript">
            alert("USUARIO INCORRECTO");
            window.location.href="../index_login.php";
            </script>';
}


// Cierra el statement.

mysqli_stmt_close($stmt); 


// Cierra la conexión a la base de datos.

mysqli_close($conectar); 


// Limpia el búfer de salida y lo envía al navegador

ob_end_flush(); 
?>
