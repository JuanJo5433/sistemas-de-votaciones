<?php
require_once '../../config/validate_session.php';
require ('../../config/control_acces.php');
require('../../config/validate_type_user.php');



?>

<!DOCTYPE html>
<html lang="en"> <!--Idioma de la pagina-->
<head>
    <meta charset="UTF-8"><!--permite caracteres-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones"/> <!--Descripcion asisgnada a la pagina-->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal"/> <!--Palabras claves para mejorar la busqueda de la página-->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver ALvarez, Yurany Henao"> <!--Nombre del autor de la pagina-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->

    <link rel="stylesheet" type="text/css" href="css/style_candidato2.css"> <!--archivo de tipo css-->
    <title>Formulario candidatos</title> <!--titulo de la pagina-->
</head>
<body>

<!-- Creacion del formulario-->
<div class="form-container">
    <h1>Registro de candidatos</h1><!--titulo del formulario-->
    <form action="insert.php" class="formulario" id="formulario" method="POST" enctype="multipart/form-data">  <!--Permite ingresar los datos en la BD-->
        <label class="texto_label" for="nombre">Nombre completo:</label> <!--titulo del primer campo-->
        <input type="text" class="form" name="nombres_apellidos" id="nombres_apellidos" placeholder="Nombres y apellidos" required> <!--campo dende se ingresa la informacion-->

        <!--lista despegable de opciones-->
        <label class="texto_label" for="tipo_documento">Seleccione el tipo de documento:</label> <!--Titulo del segundo campo-->
        <select name="tipo_documento" class="form" id="tipo_documento" required> <!--campo dende se ingresa la informacion-->
            <option hidden selected>Selecciona una opción</option> <!--opciones disponibles-->
            <option>C.C</option>
            <option>T.I</option>
            <option>C.E</option>
            <option>T.E</option>
            <option>NIT</option>
            <option>PASAPORTE</option>
        </select>

        <label class="texto_label" for="documento">Numero de documento</label> <!--Titulo del tercer campo-->
        <input type="text" class="form" name="documento" id="documento" placeholder="Numero de documento" required> <!--campo dende se ingresa la informacion-->

        <label class="texto_label" for="email">Correo electronico</label> <!--Titulo del cuarto campo-->
        <input type="email" class="form" name="email" id=email placeholder="Correo electronico"> <!--campo dende se ingresa la informacion-->

        <!--lista despegable de opciones-->
        <label class="texto_label" for="tipo_candidato">Seleccione el tipo de candidatura</label> <!--Titulo del sexto campo-->
        <select name="tipo_candidato" class="form" id="tipo_candidato" required> <!--campo dende se ingresa la informacion-->
            <option hidden selected>Selecciona una opción</option> <!--opciones disponibles-->
            <option>Alcalde</option>
            <option>Gobernador</option>
            <option>Junta de Accion Comunal</option>
            <option>Representante Sena</option>
        </select>

        <label class="texto_label" for="genero">Selecione su genero</label>
        <select name="genero" class="form" id="genero" required>
            <option hidden selected>Selecciona una opcion</opcion>
            <option>Masculino</option>
            <option>Femenino<optionon>

		
            <option>No binario</option>
        <select><label class="texto_label" for="archivos">Imagen candidato<eni/label> <!--Titulo del quinto campo-->
		<input type="file" class="form" id="image" name="image" multiple> <!--Campo donde se selecciona la imagen para subir-->
            
    </form>

    <!--botones de la interfaz-->
    <div class="boton">
    <a><input type="submit" value="Agregar" form="formulario" class="btn agregar-btn"></a>
		<button for="formulario" type="button" class="btn cancelar-btn" onclick="window.location.href='../index.php';">Cancelar</button>
    </div>
</div>  
</body>
</html>