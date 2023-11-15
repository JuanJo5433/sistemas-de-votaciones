<?php
// Incluye el archivo de configuración de la base de datos.
include('../../config/conexion.php');
// Requiere la validación de la sesión para asegurar que el usuario esté autenticado.
require_once '../../config/validate_session.php';
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
    <link rel="stylesheet" type="text/css" href="css/styleindex_visualizar.css"> <!--Archivo de tipo css-->
    <title>Visualizar votos</title> <!--Titulo de la pagina-->
</head>

<body>
    <h1>Selecciona la candidatura</h1>

    <!-- Botón para volver al menú principal -->
    <div class="btn-atras">
        <a href="../index.php">
            <button href="../../registro_candidatos/index.php">
                <!-- Icono SVG para el botón -->
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                    <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
                </svg>
                <span>Volver al Menu</span>
            </button>
        </a>
    </div>

    <!-- Contenedor de las tarjetas de candidaturas -->
    <div class="card-container">
        <!-- Enlace a la página de gráficos para candidatos a alcalde -->
        <a href="graficos_alcalde.php">
            <div class="card">
                <!-- Imagen del candidato a alcalde -->
                <div class="card-image"> <img src="img/alcalde.png" alt=""></div>
                <!-- Título de la candidatura -->
                <div class="heading"> VOTOS ALCALDE</div>
            </div>
        </a>
        <!-- Enlace a la página de gráficos para candidatos a gobernador -->
        <a href="graficos_gobernador.php">
            <div class="card">
                <!-- Imagen del candidato a gobernador -->
                <div class="card-image"><img src="img/gobernador.png" alt=""></div>
                <!-- Título de la candidatura -->
                <div class="heading"> VOTOS GOBERNADOR</div>
            </div>
        </a>
        <!-- Enlace a la página de gráficos para candidatos a JAC (Junta de Acción Comunal) -->
        <a href="graficos_jac.php">
            <div class="card">
                <!-- Imagen del candidato a JAC -->
                <div class="card-image"><img src="img/jac.png" alt=""></div>
                <!-- Título de la candidatura -->
                <div class="heading"> VOTOS JAC</div>
            </div>
        </a>
        <!-- Enlace a la página de gráficos para candidatos a Representante del SENA -->
        <a href="graficos_representante_sena.php">
            <div class="card">
                <!-- Imagen del candidato a Representante del SENA -->
                <div class="card-image"><img src="img/sena.png" alt=""> </div>
                <!-- Título de la candidatura -->
                <div class="heading">VOTOS REPRESENTANTE SENA</div>
            </div>
        </a>
    </div>
</body>

</html>
