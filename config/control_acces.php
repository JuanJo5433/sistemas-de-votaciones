<?php

// Se comprueba si la sesion de usuario se encuentra establecida.
// Ademas se comprueba si el rol es user.

if (isset($_SESSION['rol']) && $_SESSION['rol'] === "user") {
    //Redirecciona al usuario a la pagina de tipos de votacion.
    echo '<script type="text/javascript">
    window.location.href="../votaciones/index.php";
    </script>';
}

?>