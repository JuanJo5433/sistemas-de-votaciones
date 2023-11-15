<?php
require_once '../../../config/validate_session.php';
require ('../../../config/control_acces.php');
require('../../../config/validate_type_user.php');
// Configuracion de la conexion MySQL.
include('../../../config/conexion.php');
$connect = connection();

// Se obtiene el id_candidato_gobernador.
$codigo = $_GET["id_candidato_gobernador"];

// Elimina los registros relacionados en la tabla 'votos_gobernador'
$eliminar_votos = "DELETE FROM votos_gobernador WHERE id_candidato = '$codigo'";
$solicitud_votos = mysqli_query($connect, $eliminar_votos);

// Luego, elimina el candidato gobernador en la tabla 'candidatos_gobernador'
$eliminar = "DELETE FROM candidatos_gobernador WHERE id_candidato_gobernador = '$codigo'";
$solicitud = mysqli_query($connect, $eliminar);

if ($solicitud && $solicitud_votos) {
    Header("Location: mostrar.php");
} else {
    // Manejo de errores si es necesario
}


?>  