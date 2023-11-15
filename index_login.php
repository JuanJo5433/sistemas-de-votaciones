<?php
include("config/endsession.php")

?>

<!DOCTYPE html>
<html lang="en"> <!--Idioma de la pagina. -->

<head>
    <meta charset="UTF-8"> <!-- Permite caracteres. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Permite que sea compatible con el navegador de internet explorer. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones" /> <!-- Descripcion asisgnada a la pagina. -->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal" /> <!-- Palabras claves para mejorar la busqueda de la página. -->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver ALvarez, Yurany Henao"> <!-- Nombre de autores de la pagina.-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <link rel="stylesheet" type="text/css" href="css/style_login.css"> <!-- Conexion con el archivo de tipo css. -->
    <script src="https://kit.fontawesome.com/a1662918ad.js" crossorigin="anonymous"></script> <!--permite extraer iconos de otro sitio-->
    <title>Inicio</title> <!-- Titulo de la pagina. -->
</head>

<body>
    <!--Creacion del formulario-->
    <div class="form-container">
        <h1>Sistemas de votaciones S.A.S</h1> <!--titulo del formulario-->
        <form action="users/ingresar.php" class="formulario" id="formulario" method="POST"> <!--Permite ingresar los datos en la BD-->

            <label class="texto_label" for="documento">Numero de Documento: </label> <!--titulo del primer campo-->
            <input type="text" class="form" name="documento" id="documento" placeholder="Numero de Documento" required> <!--campo dende se ingresa la informacion-->

            <label class="texto_label" for="password">Contraseña: </label> <!--titulo del segundo campo-->
            <div class="password-container">
                <input type="password" class="form" name="password" id="password" placeholder="Contraseña"> <!--campo dende se ingresa la informacion-->
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" onclick="togglePassword()"></span> <!--oculta o muestra la contraseña-->
            </div>


        </form>
        <!--Botones de la inerfaz-->
        <div class="botones">
            <a><input type="submit" value="Ingresar" form="formulario"></a>
            <a href="recovery.php">¿Olvidaste tu contraseña?</a>
            <a href="index.php"><button class="btn btn-login">Registrarse</button></a>
        </div>

    </div>
    <?php
    if (isset($_GET['message'])) {
        $messageType = 'alert-error'; // Por defecto, asigna la clase de error

        switch ($_GET['message']) {
            case 'ok':
                $message = "Revisa tu correo electrónico.";
                $messageType = 'alert-primary'; // Cambia la clase si el mensaje es de éxito
                break;
            case 'success_password':
                $message = "Inicia sesión con tu nueva contraseña.";
                $messageType = 'alert-primary'; // Cambia la clase si el mensaje es de éxito
                break;
            case 'csrf_error':
                $message = "Error: No se pudo cambiar la contraseña.";
                break;
            case 'invalid_data':
                $message = "Error: No se pudo cambiar la contraseña, intenta nuevavemnte";
            default:
                $message = "Se ha generado un error, intenta de nuevo :(";
                break;
        }
    ?>
        <div class="alert <?php echo $messageType; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    </div>
    <script src="js/script_index_login.js"></script> <!--archivo de tipo js-->
</body>

</html>