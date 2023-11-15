<?php


// Configuracion de la conexion MySQL.
include('../../config/conexion.php'); 
$conexion = connection(); 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Consulta a la base de datos para obtener el estado del voto alcalde.
$sqlAlcalde = "SELECT voto_alcalde FROM usuarios WHERE documento = ".$_SESSION['documento'];
$resultAlcalde = mysqli_query($conexion, $sqlAlcalde);

if ($resultAlcalde) {

    $rowAlcalde = mysqli_fetch_assoc($resultAlcalde);
    $stateVotoAlcalde = ($rowAlcalde['voto_alcalde'] == 0) ? true : false;

} else {
    // Manejo de error si la consulta falla.
    $stateVotoAlcalde = false;
}

// Repite el proceso para obtener el estado de voto de los demás cargos (gobernador, jac, representante_sena).

// Consulta a la base de datos para obtener el estado del voto gobernador.
$sqlGobernador = "SELECT voto_gobernador FROM usuarios WHERE documento = ".$_SESSION['documento'];
$resultGobernador = mysqli_query($conexion, $sqlGobernador);

if ($resultGobernador) {

    $rowGobernador = mysqli_fetch_assoc($resultGobernador);
    $stateVotoGobernador = ($rowGobernador['voto_gobernador'] == 0) ? true : false;
    
} else {
    $stateVotoGobernador = false;
}
// Consulta a la base de datos para obtener el estado jac
$sqlJac = "SELECT voto_jac FROM usuarios WHERE documento = ".$_SESSION['documento'];
$resultJac = mysqli_query($conexion, $sqlJac);
if ($resultJac) {
    $rowJac = mysqli_fetch_assoc($resultJac);
    $stateVotoJac = ($rowJac['voto_jac'] == 0) ? true : false;
} else {
    $stateVotoJac = false;
}
// Consulta a la base de datos para obtener el estado del voto representante_sena.
$sqlSena = "SELECT voto_representante_sena FROM usuarios WHERE documento = ".$_SESSION['documento'];
$resultSena = mysqli_query($conexion, $sqlSena);
if ($resultSena) {
    $rowSena = mysqli_fetch_assoc($resultSena);
    $stateVotoRepresentanteSena = ($rowSena['voto_representante_sena'] == 0) ? true : false;
} else {
    $stateVotoRepresentanteSena = false;
}


// Verifica si el usuario ha realizado todos los votos.
if ($rowAlcalde['voto_alcalde'] == 1 && $rowGobernador['voto_gobernador'] == 1 && $rowJac['voto_jac'] == 1 && $rowSena['voto_representante_sena'] == 1) {
    $mostrarMensaje = true; // Establece la variable $mostrarMensaje en true si todos los votos están completos
} else {
    $mostrarMensaje = false; // De lo contrario, establece la variable $mostrarMensaje en false
}


$sqlVoto = "SELECT id_voto_alcalde FROM votacion_alcalde WHERE id_usuario = ".$_SESSION['documento'];
$resultadoVoto = mysqli_query($conexion, $sqlVoto);
if ($resultadoVoto){
    $rowVoto = mysqli_fetch_assoc($resultadoVoto);
    $idCandidato = ['id_voto_alcalde'];
    $id_usuario = ['id_usuario'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><!--Permite caracteres especiales-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones"> <!--descripcion de la pagina-->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal"><!--Palabras claves de la pagina-->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver Alvarez, Yurany Henao"> <!--Autores de la pagina-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <title>Document</title> <!--Titulo de la pagina-->
</head>
<body>
    <?php if($id_usuario == $_SESSION['documento']): ?>
        <?php
        echo 'ID CANDIDATO' . $idCandidato . "";
        echo 'ID CANDIDATO' . $idCandidato . "";



        ?>
        
    <?php endif; ?>
    
</body>
</html>