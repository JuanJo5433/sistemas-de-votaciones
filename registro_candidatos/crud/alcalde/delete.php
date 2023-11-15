<?php
require_once '../../../config/validate_session.php';
require ('../../../config/control_acces.php');
require('../../../config/validate_type_user.php');
// Configuracion de la conexion MySQL.
include('../../../config/conexion.php');
$connect = connection();

// Se obtiene el id_candidato_alcalde.
$codigo = $_GET["id_candidato_alcalde"];

// Elimina los registros relacionados en la tabla 'votos_alcalde'
$eliminar_votos = "DELETE FROM votos_alcalde WHERE id_candidato = '$codigo'";
$solicitud_votos = mysqli_query($connect, $eliminar_votos);

// Luego, elimina el candidato alcalde en la tabla 'candidatos_alcalde'
$eliminar = "DELETE FROM candidatos_alcalde WHERE id_candidato_alcalde = '$codigo'";
$solicitud = mysqli_query($connect, $eliminar);

if ($solicitud && $solicitud_votos) {
    echo '<script type="text/javascript">
      alert("ELIMINADO!");
      
      </script>';
    Header("Location: mostrar.php");
} else {
    // Manejo de errores si es necesario
}


?>  