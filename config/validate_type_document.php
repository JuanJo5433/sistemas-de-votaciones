<?php

// Verifica si el tipo de documento es "T.I"

if (isset($_SESSION['tipo_documento']) && $_SESSION['tipo_documento'] == "T.I") {

    // No se mostrará el div para T.I
    $ocultarDiv = false; 

} else {

    // Se mostrará el div para otros tipos de documento
    $ocultarDiv = true; 
}


?>
