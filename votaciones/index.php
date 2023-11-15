<?php
include("../config/validate_type_document.php"); // Incluye el archivo para validar el tipo de documento
require_once '../config/validate_session.php'; // Incluye el archivo para validar la sesión
include("../config/state_voto.php"); // Incluye el archivo para verificar el estado de votación
?>

<!DOCTYPE html>
<html lang="en"> <!-- Define el idioma de la página (inglés) -->

<head>
    <meta charset="UTF-8"> <!-- Configura la codificación de caracteres a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista en dispositivos móviles -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Define la compatibilidad con Internet Explorer -->
    <meta name="description" content="Este es un sitio para votaciones" /> <!-- Descripción de la página -->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal" /> <!-- Palabras clave para mejorar la búsqueda de la página -->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver ALvarez, Yurany Henao"> <!-- Nombre del autor de la página -->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <link rel="stylesheet" type="text/css" href="css/style_votacion.css"> <!-- Enlace a la hoja de estilos CSS -->
    <title>Tipo de votaciones</title> <!-- Título de la página -->

</head>

<body>

    <p>Bienvenido... <?php echo $_SESSION["nombres_apellidos"]; ?></p> <!-- Muestra un mensaje de bienvenida con el nombre del usuario -->

    <!-- Botón de cerrar sesión -->
    <div class="menu-bar">
        <a href="/proyecto_votacion/votaciones/visualizar_votos/index_visualizar.php">Visualizar Votos</a> <!-- Enlace para visualizar votos -->
        <?php if ($_SESSION['rol'] === 'admin') : ?>
            <a href="index_admin.php">Volver al Menú</a> <!-- Enlace para volver al menú de administrador (si el usuario es un administrador) -->
        <?php endif; ?>
        <a href="../config/logout.php">Cerrar Sesión</a> <!-- Enlace para cerrar sesión -->
    </div>

    <!-- Cards Tipo de Votaciones -->

    <div class="container" id="container">
        <!-- Card Alcaldia -->
        <?php if ($ocultarDiv) : ?>
            <?php if ($stateVotoAlcalde) : ?>
                <div class="tarjet" id="votacion-alcalde">
                    <h2>Votaciones de Alcalde</h2> <!-- Título de la votación de alcalde -->
                    <div class="botones">
                        <button class="btn-gradient" id="redirectButton">Ingresar</button> <!-- Botón para ingresar a la votación de alcalde -->
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Card Gobernador -->
        <?php if ($ocultarDiv) : ?>
            <?php if ($stateVotoGobernador) : ?>
                <div class="tarjet" id="votacion-gobernador">
                    <h2>Votaciones Gobernador</h2> <!-- Título de la votación de gobernador -->
                    <div class "botones">
                        <button class="btn-gradient" id="redirectButton_Gobernador">Ingresar</button> <!-- Botón para ingresar a la votación de gobernador -->
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Card Junta de Accion Comunal -->
        <?php if ($ocultarDiv) : ?>
            <?php if ($stateVotoJac) : ?>
                <div class="tarjet" id="votacion-jac">
                    <h2>Votaciones Junta Accion Comunal</h2> <!-- Título de la votación de junta de acción comunal -->
                    <div class="botones">
                        <button class="btn-gradient" id="redirectButton_jac">Ingresar</button> <!-- Botón para ingresar a la votación de junta de acción comunal -->
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Card Representante Sena -->
        <?php if ($stateVotoRepresentanteSena) : ?>
            <div class="tarjet" id="votacion-representante-sena">
                <h2>Votaciones Representante Sena</h2> <!-- Título de la votación de representante Sena -->
                <div class="botones">
                    <button class="btn-gradient" id="redirectButton_Representantes_Sena">Ingresar</button> <!-- Botón para ingresar a la votación de representante Sena -->
                </div>
            </div>
        <?php endif; ?>

        <?php if ($mostrarMensaje == true) : ?>
            <h1>Ya realizaste todos los votos</h1> <!-- Mensaje de que el usuario ya ha realizado todos los votos -->
        <?php endif; ?>
    </div>

    <!-- JavaScript para redireccionar cuando se hace clic en el botón alcaldía -->
    <?php if ($ocultarDiv && $stateVotoAlcalde) : ?>
        <script>
            document.getElementById('redirectButton').addEventListener('click', function() {
                window.location.href = 'voto/alcaldia.php'; // Redirecciona a la votación de alcalde
            });
        </script>
    <?php endif; ?>

    <!-- JavaScript para redireccionar cuando se hace clic en el botón gobernador -->
    <?php if ($ocultarDiv && $stateVotoGobernador) : ?>
        <script>
            document.getElementById('redirectButton_Gobernador').addEventListener('click', function() {
                window.location.href = 'voto/gobernador.php'; // Redirecciona a la votación de gobernador
            });
        </script>
    <?php endif; ?>

    <!-- JavaScript para redireccionar cuando se hace clic en el botón junta acción comunal -->
    <?php if ($ocultarDiv && $stateVotoJac) : ?>
        <script>
            document.getElementById('redirectButton_jac').addEventListener('click', function() {
                window.location.href = 'voto/junta_accion_comunal.php'; // Redirecciona a la votación de junta de acción comunal
            });
        </script>
    <?php endif; ?>

    <!-- JavaScript para redireccionar cuando se hace clic en el botón representantes Sena -->
    <?php if ($stateVotoRepresentanteSena) : ?>
        <script>
            document.getElementById('redirectButton_Representantes_Sena').addEventListener('click', function() {
                window.location.href = 'voto/representantes_sena.php'; // Redirecciona a la votación de representante Sena
            });
        </script>
    <?php endif; ?>
</body>
</html>
