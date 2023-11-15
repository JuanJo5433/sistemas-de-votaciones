<?php
include_once('../config/conexion.php');  // Incluye el archivo de configuración para la conexión a la base de datos.
require('../config/validate_type_user.php');  // Requiere un archivo para validar el tipo de usuario.
$conn = connection(); // Llama a la función para obtener la conexión.
include_once("index.php");  // Incluye el archivo "index.php".

$pagina = $_GET['pag'];  // Obtiene el valor del parámetro 'pag' de la URL.
$coddocumento = $_GET['documento'];  // Obtiene el valor del parámetro 'documento' de la URL.

$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE documento='$coddocumento'");  // Ejecuta una consulta SQL para buscar un usuario por su documento.

$usunombres_apellidos = $usudocumento = $usutd = $usugenero = $usurol = $usucorreo = $usupassword = '';  // Inicializa variables para almacenar información del usuario.

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    // Recorre los resultados de la consulta y asigna los valores a las variables correspondientes.
    $usudocumento = $mostrar['documento'];
    $usunombres_apellidos = $mostrar['nombres_apellidos'];
    $usucorreo = $mostrar['email'];
    $usugenero = $mostrar['genero'];
    $usurol = $mostrar['rol'];
    $usutd = $mostrar['tipo_documento'];
    $usupassword = $mostrar['password'];
}
?>
<html>

<head>
    <title>Modificar Usuario</title>  <!-- Título de la página web -->
    <meta charset="UTF-8">  <!-- Configura la codificación de caracteres a UTF-8. -->
    <link rel="stylesheet" href="style.css">  <!-- Enlace a una hoja de estilos CSS llamada "style.css". -->
</head>

<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POST">  <!-- Formulario que se envía mediante el método POST. -->
            <table>
                <tr>
                    <th colspan="2">Modificar usuario</th>  <!-- Título en una fila de la tabla. -->
                </tr>
                <tr>
                    <td>Nombres y Apellidos:</td>
                    <td><input type="text" name="txtnombres_apellidos" value="<?php echo $usunombres_apellidos; ?>" required></td>
                    <!-- Campo de entrada de texto para nombres y apellidos con valor predefinido. -->
                </tr>
                <tr>
                    <td>Documento:</td>
                    <td><input type="number" name="txtdocumento" value="<?php echo $usudocumento; ?>" required readonly></td>
                    <!-- Campo de entrada de número para el documento con valor predefinido y solo lectura. -->
                </tr>
                <tr>
                    <td>Tipo de documento:</td>
                    <td>
                        <select name="txttipo_documento" class="form" id="tipo_documento" required>
                            <option hidden selected>Selecciona una opción</option>
                            <option value="C.C" <?php if ($usutd == "C.C") echo 'selected'; ?>>C.C</option>
                            <option value="T.I" <?php if ($usutd == "T.I") echo 'selected'; ?>>T.I</option>
                            <option value="C.E" <?php if ($usutd == "C.E") echo 'selected'; ?>>C.E</option>
                            <option value="T.E" <?php if ($usutd == "T.E") echo 'selected'; ?>>T.E</option>
                            <option value="NIT" <?php if ($usutd == "NIT") echo 'selected'; ?>>NIT</option>
                            <option value="PASAPORTE" <?php if ($usutd == "PASAPORTE") echo 'selected'; ?>>PASAPORTE</option>
                        </select>
                        <!-- Campo de selección para el tipo de documento con opciones predefinidas. -->
                    </td>
                </tr>
                <tr>
                    <td>Contraseña Actual:</td>
                    <td><input type="password" name="txtpassword_actual" placeholder="Contraseña actual" required></td>
                    <!-- Campo de entrada de contraseña para la contraseña actual. -->
                </tr>
                <tr>
                    <td>Nueva Contraseña:</td>
                    <td><input type="password" name="txtpassword_nueva" placeholder="Deja en blanco para mantener la actual"></td>
                    <!-- Campo de entrada de contraseña para la nueva contraseña (opcional). -->
                </tr>
                <tr>
                    <td>Género:</td>
                    <td>
                        <input type="radio" name="txtgenero" value="masculino" <?php if ($usugenero == "masculino") echo 'checked'; ?> required> Masculino
                        <input type="radio" name="txtgenero" value="femenino" <?php if ($usugenero == "femenino") echo 'checked'; ?> required> Femenino
                        <input type="radio" name="txtgenero" value="no-binario" <?php if ($usugenero == "no-binario") echo 'checked'; ?> required> No binario
                        <!-- Selección de género con opciones predefinidas y opción seleccionada. -->
                    </td>
                </tr>
                <tr>
                    <td>Rol:</td>
                    <td><input type="text" name="txtrol" value="<?php echo $usurol; ?>" required></td>
                    <!-- Campo de entrada de texto para el rol con valor predefinido. -->
                </tr>
                <tr>
                    <td>Correo:</td>
                    <td><input type="text" name="txtcorreo" value="<?php echo $usucorreo; ?>" required></td>
                    <!-- Campo de entrada de texto para el correo con valor predefinido. -->
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo "<a href=\"index.php?pag=$pagina\">Cancelar</a>"; ?>  <!-- Enlace para cancelar con el valor de 'pagina' en la URL. -->
                        <input type="submit" name="btnmodificar" value="Modificar" onClick="return confirm('¿Deseas modificar este usuario?');">
                        <!-- Botón para enviar el formulario con confirmación. -->
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['btnmodificar'])) {
    // Verifica si se ha enviado el formulario al hacer clic en "Modificar".
    $nombres_apellidos1 = $_POST['txtnombres_apellidos'];
    $documento1 = $_POST['txtdocumento'];
    $tipo_documento1 = $_POST['txttipo_documento'];
    $genero1 = $_POST['txtgenero'];
    $rol1 = $_POST['txtrol'];
    $correo1 = $_POST['txtcorreo'];
    $password_actual = $_POST['txtpassword_actual'];
    $password_nueva = $_POST['txtpassword_nueva'];

    $querybuscar = mysqli_query($conn, "SELECT password FROM usuarios WHERE documento='$documento1'");
    $usuario = mysqli_fetch_assoc($querybuscar);

    if (password_verify($password_actual, $usuario['password'])) {
        // Verifica si la contraseña actual es correcta.

        if (empty($password_nueva)) {
            // Si no se proporcionó una nueva contraseña.
            $querymodificar = mysqli_query($conn, "UPDATE usuarios SET nombres_apellidos='$nombres_apellidos1', documento='$documento1', tipo_documento='$tipo_documento1', genero='$genero1', rol='$rol1', email='$correo1' WHERE documento='$documento1'");

            if ($querymodificar) {
                echo "<script>window.location= 'index.php?pag=$pagina' </script>";
            } else {
                echo "Error al modificar el usuario: " . mysqli_error($conn);
            }
        } else {
            // Si se proporcionó una nueva contraseña.
            // Verifica la longitud y complejidad de la nueva contraseña.
            if (strlen($password_nueva) < 7 || !preg_match('/[A-Z]/', $password_nueva) || !preg_match('/[a-z]/', $password_nueva) || !preg_match('/\d/', $password_nueva)) {
                echo "La nueva contraseña debe contener al menos una mayúscula, una minúscula y tener más de 7 caracteres.";
            } else {
                // La nueva contraseña es segura
                $password_nueva = password_hash($password_nueva, PASSWORD_DEFAULT);
                $querymodificar = mysqli_query($conn, "UPDATE usuarios SET nombres_apellidos='$nombres_apellidos1', documento='$documento1', tipo_documento='$tipo_documento1', genero='$genero1', rol='$rol1', email='$correo1', password='$password_nueva' WHERE documento='$documento1'");

                if ($querymodificar) {
                    echo "<script>window.location= 'index.php?pag=$pagina' </script>";
                } else {
                    echo "Error al modificar el usuario: " . mysqli_error($conn);
                }
            }
        }
    } else {
        echo "La contraseña actual es incorrecta. Por favor, verifica tu contraseña.";
    }
}

?>
