
<?php
session_start(); // Iniciar la sesión
include("config/conexion.php");
$conectar = connection();

    
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
    <title>Recuperar contraseña</title> <!-- Titulo de la pagina. -->
</head>

<body>
    <!--Creacion del formulario-->
    <div class="form-container">
        <h1>Sistemas de votaciones S.A.S</h1> <!--titulo del formulario-->
        <form action="config/change_password.php" class="formulario" id="formulario" method="POST"  onsubmit="return validarContraseña()"> <!--Permite ingresar los datos en la BD-->


            <label class="texto_label" for="new_password">Ingrese su nueva contraseña: </label> <!--titulo del primer campo-->
            <label class="texto_label" for="email">Ingrese su email para confirmar el cambio de contraseña</label> <!--titulo del quinto campo-->
            <input type="text" class="form" name="email" id="email" placeholder="Correo electronico" required> <!--campo dende se ingresa la informacion-->
            <label class="texto_label_pswd" for="password">Debe contener una letra mayuscula, minuscula, un simbolo, un numero y 7 caracteres como minimo</label> <!--titulo del quinto campo-->
            <input type="text" class="form" name="new_password" id="new_password" placeholder="Nueva contraseña" required> <!--campo dende se ingresa la informacion-->
            <input type="hidden" name="documento" id="documento" value="<?php echo $_GET['documento']?>"> <!--campo dende se ingresa la informacion-->
              


        </form>
        <!--Botones de la inerfaz-->
        <div class="botones">
            <a><input type="submit" value="Recuperar contraseña" form="formulario"></a>
            <a href="index_login.php"><button class="btn btn-login">Atras</button></a>
        </div>

    </div>


    <script>
        function validarContraseña() {
    var password = document.getElementById('new_password').value;

    // Expresión regular para validar la contraseña
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{7,}$/;

    if (!regex.test(password)) {
        alert("La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un número, un símbolo y ser de al menos 7 caracteres de longitud.");
        return false;
    }

    return true;
}
    </script> <!--archivo de tipo js-->
</body>

</html>