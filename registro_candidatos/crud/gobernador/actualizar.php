<?php
include("../../../config/conexion.php"); //conexion con la BD
require_once '../../../config/validate_session.php'; //Permite validar el inicio de sesion
require ('../../../config/control_acces.php'); //controla el acceso
require('../../../config/validate_type_user.php'); //Valida el tipo de usuario
$connect = connection();
$id = $_GET["id_candidato_gobernador"]; //Optiene el id del candidato

$consulta = "SELECT * FROM candidatos_gobernador WHERE id_candidato_gobernador='$id'"; //realiza la consulta del id en la BD
$solicitud = mysqli_query($connect, $consulta); //completa la solicitud
$row = mysqli_fetch_array($solicitud); //completa la solicitud
$base64Image = base64_encode($row['image']); //convierte la imagen en codigo binario
$imageSrc = 'data:image/jpeg;base64,' . $base64Image; //convierte la imagen en codigo binario

?>

<!DOCTYPE html>
<html lang="en"> <!--Idioma de la pagina. -->

<head>

    <meta charset="UTF-8"> <!-- Permite caracteres. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Se adapta a los dispositivos. -->
    <meta name="description" content="Este es un sitio para votaciones" /> <!-- Descripcion asisgnada a la pagina. -->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal" /> <!-- Palabras claves para mejorar la busqueda de la página. -->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver ALvarez, Yurany Henao"> <!-- Nombre de autores de la pagina.-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->

    <link rel="stylesheet" type="text/css" href="../../css/styleactualizar1.css"> <!-- Conexion con el archivo de tipo css. -->
    <title>Editar candidato</title> <!-- Titulo de la pagina. -->

</head>

<body>
    <!-- Contenedor principal. -->
    <div class="container">
        <!-- Encabezado. -->
        <h2>Editar Candidato a la gobernacion</h2>
        <form action="update.php" class="formulario" id="formulario" method="POST" enctype="multipart/form-data">

            <!-- Campo de texto para el nombre completo. -->
            <input type="hidden" name="id_candidato_gobernador" value="<?= $row['id_candidato_gobernador'] ?>">
            <label class="texto_label" for="nombre">Nombre completo:</label>
            <input type="text" class="form" name="nombres_apellidos" id="nombres_apellidos" placeholder="Nombres y apellidos" value="<?= $row['nombre_completo'] ?>">

            <!-- Lista despegable de opciones para el tipo de documento. -->
            <label class="texto_label" for="tipo_documento">Seleccione el tipo de documento:</label>
            <select name="tipo_documento" class="form" id="tipo_documento">
                <option value="C.C" <?= ($row['tipo_documento'] == 'C.C') ? 'selected' : '' ?>>C.C</option>
                <option value="T.I" <?= ($row['tipo_documento'] == 'T.I') ? 'selected' : '' ?>>T.I</option>
                <option value="C.E" <?= ($row['tipo_documento'] == 'C.E') ? 'selected' : '' ?>>C.E</option>
                <option value="T.E" <?= ($row['tipo_documento'] == 'T.E') ? 'selected' : '' ?>>T.E</option>
                <option value="NIT" <?= ($row['tipo_documento'] == 'NIT') ? 'selected' : '' ?>>NIT</option>
                <option value="PASAPORTE" <?= ($row['tipo_documento'] == 'PASAPORTE') ? 'selected' : '' ?>>PASAPORTE</option>
            </select>


            <!-- Campo de texto para el numero de documento. -->
            <label class="texto_label" for="documento">Numero de documento</label>
            <input type="text" class="form" name="documento" id="documento" placeholder="Numero de documento" value="<?= $row['documento'] ?>">

            <!-- Campo de texto para el correo electronico. -->
            <label class="texto_label" for="email">Correo electronico</label>
            <input type="email" class="form" name="email" id=email placeholder="Correo electronico" value="<?= $row['email'] ?>">

            <label class="texto_label_genero" for="genero">Seleccione su genero: </label>
            <select name="genero" class="form" id="genero">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="No binario">No binario</option>
            </select>

            <!-- Campo para seleccionar la imagen del candidato. -->
            <label class="texto_label" for="imagen">Seleccionar imagen</label>
            <input type="file" class="form" name="image" id="image" multiple>


        </form>
        <!-- Boton de envio, para actualizar los datos del candidato. -->
    
        
        <div class="btn-actualizar">
            
            <button type="submit" value="Actualizar" form="formulario" href="update.php">
        
                Actualizar
                <div class="arrow-wrapper">
                    <div class="arrow"></div>

                </div>
            </button>
            
        </div>
        
        

        
        <!-- Boton de retroceso, para volver a la pagina de consulta. -->
        <div class="btn-atras">
            <a href="mostrar.php">
                <button href="../consulta.php">
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                    <span>Atras</span>
                </button>
            </a>
        </div>

        
        
    </div>
</body>

</html>