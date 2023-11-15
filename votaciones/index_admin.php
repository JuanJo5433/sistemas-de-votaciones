<?php
session_start(); // Inicia la sesión
require_once '../config/validate_session.php'; // Incluye el archivo para validar la sesión
require('../config/validate_type_user.php'); // Incluye el archivo para validar el tipo de usuario
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Este es un sitio para votaciones">
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal">
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver ALvarez, Yurany Henao">
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <link rel="stylesheet" type="text/css" href="css/estilo_index_admin.css"> <!-- Enlace a la hoja de estilos CSS -->
    <script src="https://kit.fontawesome.com/a1662918ad.js" crossorigin="anonymous"></script> <!-- Inclusión de FontAwesome para iconos -->
</head>
<body>
<div class="boton_end">
    <a href="../config/logout.php"><button id="cerrar-secion-btn">Cerrar Sesion</button></a> <!-- Botón para cerrar la sesión -->
</div>
<div class="container">
    <a href="index.php">
        <div class="menu" id="menu1">
            <i class="fa-solid fa-check-to-slot"></i> <!-- Icono de FontAwesome -->
            <span>Menu votos</span> <!-- Texto del menú -->
            <i class="fa-solid fa-arrow-right"></i> <!-- Icono de FontAwesome -->
        </div>
    </a>
    <a href="../usuarios/index.php">
        <div class="menu"  id="menu2">
            <i class="fa-solid fa-user"></i> <!-- Icono de FontAwesome -->
            <span>Menu Usuarios</span> <!-- Texto del menú -->
            <i class="fa-solid fa-arrow-right"></i> <!-- Icono de FontAwesome -->
        </div>
    </a>
    <a href="../registro_candidatos/index.php">
        <div class="menu"  id="menu3">
            <i class="fa-solid fa-user-tie"></i> <!-- Icono de FontAwesome -->
            <span>Menu Candidatos</span> <!-- Texto del menú -->
            <i class="fa-solid fa-arrow-right"></i> <!-- Icono de FontAwesome -->
        </div>
    </a>
</div>
</body>
</html>
