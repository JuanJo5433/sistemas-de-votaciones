
<?php
session_start();
require_once '../config/validate_session.php';
require('../config/validate_type_user.php');
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
    <link rel="stylesheet" type="text/css" href="css/styleindex1.css"> <!--Archivo tipo css-->
    <title>Candidatos</title>
</head>
<body>
    <!--Titulo de primer nivel-->
    <h1>Administrar candidatos</h1>
    <!--Boton para ir a atras-->
    <div class="btn-atras">
        <!--ruta de redireccion-->
        <a href="../votaciones/index_admin.php">
            <button href='../votaciones/index_admin.php'>
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                <!--Boton-->
                <span>Volver al Menu</span>
            </button>
        </a>
    
    </div>
    
    <!--Boton para agregar candidatos-->
    <div class="form">
        <a href="form/candidatos.php">
            <div class="container" type="boton" id="ingresar">
                <img id="image" src="img/Agregar2.png">
                <span class="boton">Agregar</span>
            </div>
        </a>

        <!--Boton para mostrar los candidatos-->
        <a href="crud/mostrar_candidatos.php">
            <div class="container" type="boton" id="mostrar">
                <img id="image" src="img/mostrar.png">
                <span  class="boton">Mostrar candidatos</span>
            </div>
        </a>

        
    </div>

</body>
</html>