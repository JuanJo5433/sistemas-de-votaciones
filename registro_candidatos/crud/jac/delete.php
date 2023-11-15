<?php

// Configuracion de la conexion MySQL.
include('../../../config/conexion.php');
require_once '../../../config/validate_session.php';
require ('../../../config/control_acces.php');
require('../../../config/validate_type_user.php');
$connect = connection();

// Se obtiene el id_candidato_jac.
$codigo = $_GET["id_candidato_jac"];

// Elimina los registros relacionados en la tabla 'votos_jac'
$eliminar_votos = "DELETE FROM votos_jac WHERE id_candidato = '$codigo'";
$solicitud_votos = mysqli_query($connect, $eliminar_votos);

// Luego, elimina el candidato JAC en la tabla 'candidatos_jac'
$eliminar = "DELETE FROM candidatos_jac WHERE id_candidato_jac = '$codigo'";
$solicitud = mysqli_query($connect, $eliminar);

if ($solicitud && $solicitud_votos) {
    Header("Location: mostrar.php");
} else {
    // Manejo de errores si es necesario
}


?>  