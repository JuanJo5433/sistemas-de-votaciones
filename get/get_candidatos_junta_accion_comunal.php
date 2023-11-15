<?php

// Configuracion de la conexion MySQL.

require('conexion.php'); 



// Función para obtener los candidatos a junta de accion comunal desde la base de datos.

function obtenerCandidatos($conector) {

    $sql = "SELECT * FROM candidatos_jac";
    $result = mysqli_query($conector, $sql);

    $candidatos = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $candidatos[] = $row;

    }

    return $candidatos;
}


// Obtener los candidatos utilizando la función de conexión.

$conexion = connection();
$candidatos = obtenerCandidatos($conexion);
mysqli_close($conexion);

?>