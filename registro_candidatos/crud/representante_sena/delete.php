<?php

// Configuracion de la conexion MySQL.
include('../../../config/conexion.php');
$connect = connection();

// Se obtiene el id_candidato_representante_sena.
$codigo = $_GET["id_candidato_representante_sena"];

// Elimina los registros relacionados en la tabla 'votos_representante_sena'
$eliminar_votos = "DELETE FROM votos_representante_sena WHERE id_candidato = '$codigo'";
$solicitud_votos = mysqli_query($connect, $eliminar_votos);

// Luego, elimina el candidato representante SENA en la tabla 'candidatos_representante_sena'
$eliminar = "DELETE FROM candidatos_representante_sena WHERE id_candidato_representante_sena = '$codigo'";
$solicitud = mysqli_query($connect, $eliminar);

if ($solicitud && $solicitud_votos) {
    Header("Location: mostrar.php");
} else {
    // Manejo de errores si es necesario
}


?>  