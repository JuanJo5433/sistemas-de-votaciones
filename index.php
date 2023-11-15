<?php
include("config/endsession.php");
// Iniciar seccion PHP.
session_start();




// Verifica si las variables de sesión están configuradas
if (isset($_SESSION['nombres_apellidos'])) {
    $nombres_apellidos = $_SESSION['nombres_apellidos'];
    $tipo_documento = $_SESSION['tipo_documento'];
    $documento = $_SESSION['documento'];
    $email = $_SESSION['email'];
    $genero = $_SESSION['genero'];
    $password = $_SESSION['password'];
    $password_two = $_SESSION['password_two'];
} else {
    $nombres_apellidos = "";
    $tipo_documento = "";
    $documento = "";
    $email = "";
    $genero = "";
    $password = "";
    $password_two = "";
}

// Limpia las variables de sesión
unset($_SESSION['nombres_apellidos']);
unset($_SESSION['tipo_documento']);
unset($_SESSION['documento']);
unset($_SESSION['email']);
unset($_SESSION['genero']);
unset($_SESSION['password']);
unset($_SESSION['password_two']);
?>

<!DOCTYPE html>
<html lang="en"><!--Idioma de la pagina-->

<head>
    <meta charset="UTF-8"> <!--permite uso de caracteres-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones" /> <!--Descripcion asisgnada a la pagina-->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal" /> <!--Palabras claves para mejorar la busqueda de la página-->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver ALvarez, Yurany Henao"> <!--Nombre del autor de la pagina-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <link rel="stylesheet" type="text/css" href="css/styleIndex.css"> <!--archivo de tipo css-->
    <script src="https://kit.fontawesome.com/a1662918ad.js" crossorigin="anonymous"></script> <!--permite extraer iconos de otro sitio-->
    <script src="js/script_index.js"></script> <!--archivo de tipo js-->
    <title>Inicio</title> <!--titulo de la pagina-->
</head>

<body>
    <!--Creacion del formulario-->
    <div class="form-container">
        <h1>Sistemas de votaciones S.A.S</h1> <!--titulo del formulario-->
        <form action="users/insertar.php" class="formulario" id="formulario" method="POST"> <!--Permite ingresar los datos en la BD-->
            <label class="texto_label" for="nombre">Nombre Completo: </label> <!--titulo del primer campo-->
            <input type="text" class="form" name="nombres_apellidos" id="nombres_apellidos" value="<?php echo $nombres_apellidos; ?>" placeholder="Nombre y Apellidos" required> <!--campo dende se ingresa la informacion-->

            <label class="texto_label" for="tipo_documento">Seleccione su tipo de documento: </label> <!--Titulo del segundo campo-->
            <select name="tipo_documento" class="form" id="tipo_documento" value="<?php echo $tipo_documento; ?>" required> <!--creacion de lista despegable-->
                <option hidden selected>Selecciona una opción</option> <!--opciones disponibles-->
                <!-- <option disabled selected>Selecciona una opción</option> -->
                <option>C.C</option>
                <option>T.I</option>
                <option>C.E</option>
                <option>T.E</option>
                <option>PASAPORTE</option>
            </select>
            

            <label class="texto_label" for="documento" step="1">Numero de Documento (sin puntos ni comas): </label> <!--titulo del tercer campo-->
            <input type="text" class="form" name="documento" id="documento" value="<?php echo $documento; ?>" placeholder="Numero de Documento" required> <!--campo dende se ingresa la informacion-->

            <label class="texto_label" for="email">Correo Electronico: </label> <!--titulo del cuanto campo-->
            <input type="email" class="form" name="email" id="email" value="<?php echo $email; ?>" placeholder="example@dominio.com"> <!--campo dende se ingresa la informacion-->

            <label class="texto_label" for="password">Contraseña: </label> <!--titulo del quinto campo-->
            <label class="texto_label_pswd" for="password">Debe contener una letra mayuscula, minuscula, un simbolo, un numero y 7 caracteres como minimo</label> <!--titulo del quinto campo-->
            <div class="password-container">
                <input type="password" class="form" name="password" id="password" value="<?php echo $password; ?>" placeholder="Contraseña"> <!--campo dende se ingresa la informacion-->
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" onclick="togglePassword()"></span> <!--oculta o muestra la contraseña-->
            </div>

            <label class="texto_label" for="password">Repite la contraseña: </label> <!--titulo del sexto campo-->
            <div class="password-container">
                <input type="password" class="form" name="password-two" id="password-two" value="<?php echo $password_two; ?>" placeholder="Contraseña"> <!--campo dende se ingresa la informacion-->
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password-two" onclick="togglePasswordTwo()"></span> <!--oculta o muestra la contraseña-->
            </div>


            <label class="texto_label_genero" for="genero">Genero: </label> <!--titulo del septimo campo-->
            <input type="radio" name="genero" value="masculino" required> Masculino <!--contenido-->
            <input type="radio" name="genero" value="femenino" required> Femenino <!--contenido-->
            <input type="radio" name="genero" value="no-binario" required> No binario <!--contenido-->

            <div class="checkbox-container">
                <input type="checkbox" name="casilla" id="casilla" required> <!--cuadro de seleccion-->
                ACEPTO TRATAMIENTO DE DATOS
            </div>


        </form>
        <!--Botones de la inerfaz-->
        <div class="botones">
            <a><input type="submit" value="Registrarse" form="formulario"></a>
            <a href="index_login.php"><button class="btn btn-login">Iniciar Sesion</button></a>
        </div>

    </div>

</body>

</html>