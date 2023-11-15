<?php
include_once('../config/conexion.php'); // Incluye el archivo de conexión a la base de datos
require('../config/validate_type_user.php'); // Incluye el archivo para validar el tipo de usuario
$conn = connection(); // Obtiene una conexión a la base de datos
include_once("index.php"); // Incluye otro archivo PHP llamado "index.php"

$pagina = $_GET['pag']; // Obtiene el valor de la variable "pag" desde la URL
?>

<html>

<head>
<meta charset="UTF-8"><!--Permite caracteres especiales-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones"> <!--descripcion de la pagina-->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal"><!--Palabras claves de la pagina-->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver Alvarez, Yurany Henao"> <!--Autores de la pagina-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <title>CREAR USUARIO</title> <!-- Título de la página -->
    <link rel="stylesheet" href="style.css"> <!-- Enlace a la hoja de estilos CSS -->
</head>

<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POST"> <!-- Formulario de registro de usuario -->
            <table>
                <tr>
                    <th colspan="2">Agregar usuario</th> <!-- Título de la sección de registro -->
                </tr>
                <tr>
                    <td>Documento</td>
                    <td><input type="text" name="txtdocumento" autocomplete="off"></td> <!-- Campo de entrada para el documento -->
                </tr>
                <tr>
                    <td>Nombres y Apellidos</td>
                    <td><input type="text" name="txtnombres_apellidos" autocomplete="off"></td> <!-- Campo de entrada para los nombres y apellidos -->
                </tr>
                <tr>
                    <td>Tipo de Documento</td>
                    <td>
                        <select name="txttipo_documento" class="form" id="tipo_documento" required> <!-- Menú desplegable para seleccionar el tipo de documento -->
                            <option hidden selected>Selecciona una opción</option>
                            <option value="C.C">C.C</option>
                            <option value="T.I">T.I</option>
                            <option value="C.E">C.E</option>
                            <option value="T.E">T.E</option>
                            <option value="NIT">NIT</option>
                            <option value="PASAPORTE">PASAPORTE</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input type="password" name="txtpassword" required></td> <!-- Campo de entrada para la contraseña -->
                </tr>
                <tr>
                    <td>Repetir Contraseña</td>
                    <td><input type="password" name="txtpassword_repeat" required></td> <!-- Campo de entrada para repetir la contraseña -->
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txtemail" autocomplete="off"></td> <!-- Campo de entrada para el correo electrónico -->
                </tr>
                <tr>
                    <td>Género:</td>
                    <td>
                        <input type="radio" name="txtgenero" value="masculino" required> Masculino
                        <input type="radio" name="txtgenero" value="femenino" required> Femenino
                        <input type="radio" name="txtgenero" value="no-binario" required> No binario <!-- Opciones para seleccionar el género -->
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="index.php?pag=<?php echo $pagina; ?>">Cancelar</a> <!-- Enlace para cancelar el registro -->
                        <input type="submit" name="btnregistrar" value="Registrar" onClick="return confirm('¿Deseas registrar a este usuario?');"> <!-- Botón para registrar al usuario -->
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['btnregistrar'])) { // Si se hace clic en el botón "Registrar"
    $vaidocumento = $_POST['txtdocumento']; // Obtiene el valor del documento
    $vaiusu = $_POST['txtnombres_apellidos']; // Obtiene el valor de los nombres y apellidos
    $vaitipo_documento = $_POST['txttipo_documento']; // Obtiene el valor del tipo de documento
    $vaiemail = $_POST['txtemail']; // Obtiene el valor del correo electrónico
    $vaigenero = $_POST['txtgenero']; // Obtiene el valor del género
    $password = $_POST['txtpassword']; // Obtiene la contraseña
    $password_repeat = $_POST['txtpassword_repeat']; // Obtiene la contraseña repetida

    // Verificar si las contraseñas coinciden
    if ($password === $password_repeat) {
        // Verifica la longitud y complejidad de la contraseña
        if (strlen($password) >= 7 && preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/\d/', $password)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash de la contraseña
            $vairol = 'user'; // Rol por defecto como 'user'
            $queryadd = mysqli_query($conn, "INSERT INTO usuarios(documento, nombres_apellidos, email, genero, password, tipo_documento, rol) VALUES('$vaidocumento', '$vaiusu', '$vaiemail', '$vaigenero', '$password_hash', '$vaitipo_documento', '$vairol')"); // Consulta para insertar el usuario en la base de datos
            if (!$queryadd) {
                echo "<script>alert('Documento duplicado, intenta otra vez');</script>"; // Muestra un mensaje si el documento ya está duplicado
            } else {
                echo "<script>window.location = 'index.php?pag=1';</script>"; // Redirecciona a la página de inicio
            }
        } else {
            echo "La contraseña debe contener al menos una mayúscula, una minúscula y más de 7 caracteres."; // Muestra un mensaje de error si la contraseña no cumple con los requisitos
        }
    } else {
        echo "Las contraseñas no coinciden. Por favor, verifica."; // Muestra un mensaje si las contraseñas no coinciden
    }
}
?>
