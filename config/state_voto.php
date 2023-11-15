<?php

// Configuracion de la conexion MySQL.
include("conexion.php"); 
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

