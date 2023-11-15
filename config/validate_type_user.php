<?php

if (session_status() == PHP_SESSION_NONE) {
    // Solo inicia la sesión si no está activa
    session_start();
}

// Se comprueba si la sesion de usuario se encuentra establecida.
// Ademas se comprueba si el rol es admin para poder redireccionar a la pagina de index_admin sino redirecciona a index.php

if (isset($_SESSION['rol']) && $_SESSION['rol'] === "admin") {
   
    $typeUser= (true);
    
}else{
    header('Location: /proyecto_votacion/votaciones/index.php');

    $typeUser= (false);
}
?>