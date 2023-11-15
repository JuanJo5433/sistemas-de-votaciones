<?php
require_once '../../config/validate_session.php'; // Se requiere el archivo para validar la sesión del usuario.
require ('../../config/control_acces.php'); // Se requiere el archivo para controlar el acceso.
require('../../config/validate_type_user.php'); // Se requiere el archivo para validar el tipo de usuario.
?>

<!DOCTYPE html>
<html lang="en"> <!-- Declara el idioma de la página como inglés. -->
<head>
    <meta charset="UTF-8"> <!-- Configura la codificación de caracteres a UTF-8. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Define la compatibilidad con Internet Explorer. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Establece la escala inicial para dispositivos móviles. -->
    <meta name="description" content="Este es un sitio para votaciones"> <!-- Descripción de la página. -->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal"> <!-- Palabras clave para mejorar la búsqueda. -->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver ALvarez, Yurany Henao"> <!-- Nombre del autor de la página. -->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->

    <link rel="stylesheet" type="text/css" href="../../registro_candidatos/css/stylemostrar_candidatos1.css"><!-- Enlaza una hoja de estilo CSS. -->
    <title>Candidatos</title><!-- Establece el título de la página. -->
</head>
<body>
    <!-- Creación de un botón "Atrás" que redirecciona a la página index.php. -->
    <div class="btn-atras">
        <a href="../index.php">
            <button href='index.php'>
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                    <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                    </path>
                </svg>
                <span>Atras</span>
            </button>
        </a>
    </div>

    <!-- Título de la interfaz. -->
    <h1>Administrar candidatos</h1>
    <!-- Interacciones con otras interfaces. -->
    <div class="form">
        <!-- Primer botón que redirige a la página "alcalde/mostrar.php". -->
        <a href="alcalde/mostrar.php">
            <div class="container" type="boton" id="ingresar">
                <img id="image" src="img/alcalde.png">
                <span class="boton">Candidatos de Alcaldia</span>
            </div>
        </a>

        <!-- Segundo botón que redirige a la página "gobernador/mostrar.php". -->
        <a href="gobernador/mostrar.php">
            <div class="container" type="boton" id="mostrar">
                <img id="image" src="img/gobernador.png">
                <span class="boton">Candidatos de Gobernacion</span>
            </div>
        </a>

        <!-- Tercer botón que redirige a la página "jac/mostrar.php". -->
        <a href="jac/mostrar.php">
            <div class="container" type="boton" id="mostrar">
                <img id="image" src="img/jac.png">
                <span class="boton">Candidatos Jac</span>
            </div>
        </a>

        <!-- Cuarto botón que redirige a la página "representante_sena/mostrar.php". -->
        <a href="representante_sena/mostrar.php">
            <div class="container" type="boton" id="mostrar">
                <img id="image" src="img/sena.png">
                <span class="boton">Candidatos Representante Sena</span>
            </div>
        </a>
    </div>
</body>
</html>
