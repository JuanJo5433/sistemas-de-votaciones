<?php

// Inicia la sesión al principio del script.

session_start(); 


// Iniciar el buffer de salida.

ob_start(); 


// Configuracion de la conexion MySQL.

include("../config/conexion.php"); 
$conectar = connection(); // Llama la función para establecer la conexión a la base de datos.


// Se declaran las variables que almacenaran los datos del usuario.

$id_usuario = NULL; 
$nombres_apellidos = $_POST['nombres_apellidos']; 
$tipo_documento = $_POST['tipo_documento']; 
$documento = $_POST['documento']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
$password_two = $_POST['password-two'];
$genero = $_POST['genero']; 

// Se definen las variables de los votos de cada tipo de votacion , inicializadas como False

$voto_alcalde = FALSE; 
$voto_gobernador = FALSE;
$voto_jac = FALSE; 
$voto_representante_sena = FALSE;
// Verifica si la contraseña cumple con los requisitos
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{7,}$/', $password)) {
    // La contraseña no cumple con los requisitos

    // Almacena los valores en variables de sesión para preservarlos en caso de error.
    
    $_SESSION['nombres_apellidos'] = $nombres_apellidos;
    $_SESSION['tipo_documento'] = $tipo_documento;
    $_SESSION['documento'] = $documento;
    $_SESSION['email'] = $email;
    $_SESSION['genero'] = $genero;
    $_SESSION['password'] = $password;
    $_SESSION['password_two'] = $password_two;

    // Muestra un mensaje de alerta y redirige al usuario a la página de inicio.
    echo '<script type="text/javascript">
    alert("La contraseña debe tener al menos 7 caracteres, contener al menos una letra mayúscula, una letra minúscula y un numero");
    window.location.href="../index.php";
    </script>';
    exit();
}

// Se define el Rol del ingresado.

$rol = 'user';  


// Genera un hash de la contraseña usando BCRYPT.

$p_hashed = password_hash($password, PASSWORD_BCRYPT); 


// Consulta SQL para verificar si el documento ya existe.

$consulta_documento = "SELECT documento FROM usuarios WHERE documento = ?"; 


// Prepara la consulta SQL en la conexión.

$stmt_documento = mysqli_prepare($conectar, $consulta_documento); 

mysqli_stmt_bind_param($stmt_documento, "s", $documento); // Asocia el valor del marcador de posición '?' en la consulta.
mysqli_stmt_execute($stmt_documento); // Ejecuta la consulta preparada.
mysqli_stmt_store_result($stmt_documento); // Almacena el resultado en el statement.


// Consulta SQL para verificar si el correo electrónico ya existe.

$consulta_correo = "SELECT email FROM usuarios WHERE email = ?"; 


// Prepara la consulta SQL en la conexión.

$stmt_correo = mysqli_prepare($conectar, $consulta_correo); 

mysqli_stmt_bind_param($stmt_correo, "s", $email); // Asocia el valor del marcador de posición '?' en la consulta.
mysqli_stmt_execute($stmt_correo); // Ejecuta la consulta preparada.
mysqli_stmt_store_result($stmt_correo); // Almacena el resultado en el statement.


if ($password != $password_two) {

    // Almacena los valores en variables de sesión para preservarlos en caso de error.

    $_SESSION['nombres_apellidos'] = $nombres_apellidos;
    $_SESSION['tipo_documento'] = $tipo_documento;
    $_SESSION['documento'] = $documento;
    $_SESSION['email'] = $email;
    $_SESSION['genero'] = $genero;


    // Muestra un mensaje de alerta y redirige al usuario a la página de inicio.

    echo '<script type="text/javascript">
    alert(" LAS CONTRASEÑAS NO SON IGUALES");
    window.location.href="../index.php";
    </script>';


// Verifica si el documento ya existe en la base de datos.
} elseif (strpos($documento, '.') !== false){
    
    $_SESSION['nombres_apellidos'] = $nombres_apellidos;
    $_SESSION['tipo_documento'] = $tipo_documento;
    $_SESSION['documento'] = $documento;
    $_SESSION['email'] = $email;
    $_SESSION['genero'] = $genero;
    $_SESSION['password'] = $password;
    $_SESSION['password_two'] = $password_two;
    // Verificar si hay puntos en la cadena
    
        echo '<script type="text/javascript">
        alert(" El documento no debe contener puntos");
        window.location.href="../index.php";
        </script>';
    
    

} elseif (mysqli_stmt_num_rows($stmt_documento) > 0) { 

    // Almacena los valores en variables de sesión para preservarlos en caso de error.

    $_SESSION['nombres_apellidos'] = $nombres_apellidos;
    $_SESSION['tipo_documento'] = $tipo_documento;
    $_SESSION['documento'] = $documento;

  
    
    $_SESSION['email'] = $email;
    $_SESSION['genero'] = $genero;
    $_SESSION['password'] = $password;
    $_SESSION['password_two'] = $password_two;


    // Muestra un mensaje de alerta y redirige al usuario a la página de inicio.

    echo '<script type="text/javascript">
    alert(" El documento ya se encuentra registrado");
    window.location.href="../index.php";
    </script>';


// Verifica si el correo electrónico ya existe en la base de datos.

} elseif (mysqli_stmt_num_rows($stmt_correo) > 0) { 

    // Almacena los valores en variables de sesión para preservarlos en caso de error.

    $_SESSION['nombres_apellidos'] = $nombres_apellidos;
    $_SESSION['tipo_documento'] = $tipo_documento;
    $_SESSION['documento'] = $documento;
    $_SESSION['email'] = $email;
    $_SESSION['genero'] = $genero;
    $_SESSION['password'] = $password;
    $_SESSION['password_two'] = $password_two;


    // Muestra un mensaje de alerta y redirige al usuario a la página de inicio.

    echo '<script type="text/javascript">
    alert(" El correo electrónico ya se encuentra registrado");
    window.location.href="../index.php";
    </script>';


} else {

    if ($tipo_documento === "Selecciona una opción") {

        $_SESSION['nombres_apellidos'] = $nombres_apellidos;
        $_SESSION['tipo_documento'] = $tipo_documento;
        $_SESSION['documento'] = $documento;
        $_SESSION['email'] = $email;
        $_SESSION['genero'] = $genero;
        $_SESSION['password'] = $password;
        $_SESSION['password_two'] = $password_two;


        echo '<script type="text/javascript">
        alert(" Seleccione un tipo de documento valido");
        window.location.href="../index.php";
        </script>';
        
        exit();


    } else {

        // Inserta los valores en la base de datos usando una consulta preparada.

        // Inserta los valores en la base de datos usando una consulta preparada.
        $insertar = "INSERT INTO usuarios (documento, nombres_apellidos, tipo_documento, email, password, genero, voto_alcalde, voto_gobernador, voto_jac, voto_representante_sena, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



        // Prepara la consulta SQL de inserción.

        $stmt_insert = mysqli_prepare($conectar, $insertar); 


        // Asocia los valores a la consulta.

        mysqli_stmt_bind_param($stmt_insert, "sssssssssss", $documento, $nombres_apellidos, $tipo_documento, $email, $p_hashed, $genero, $voto_alcalde, $voto_gobernador, $voto_jac, $voto_representante_sena, $rol);



        // Ejecuta la consulta preparada.

        if (mysqli_stmt_execute($stmt_insert)) {

            header("Location: ../index_login.php"); // Redirige al usuario a la página de votaciones.
            exit;

        } else {
            // Manejar errores de inserción (aquí puedes agregar el código para manejarlos).
        }
    }
}


// Liberar el buffer de salida al final del script.

ob_end_flush(); 
