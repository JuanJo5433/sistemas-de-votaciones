<?php
include_once('../config/conexion.php'); // Incluye el archivo de configuración para la conexión a la base de datos.
require('../config/validate_type_user.php'); // Requiere un archivo para validar el tipo de usuario.
$conn = connection(); // Llama a la función para obtener la conexión.

include_once("index.php"); // Incluye el archivo "index.php".

$pagina = $_GET['pag']; // Obtiene el valor del parámetro 'pag' de la URL.
$coddocumento = $_GET['documento']; // Obtiene el valor del parámetro 'documento' de la URL.

$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE documento=$coddocumento"); // Ejecuta una consulta SQL para buscar un usuario por su documento.

$usudocumento = $usunom = $usutd = $usucorreo = $usugenero = ''; // Inicializa variables para almacenar información del usuario.

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $usudocumento = $mostrar['documento']; // Obtiene el valor del campo 'documento'.
    $usunom = $mostrar['nombres_apellidos']; // Obtiene el valor del campo 'nombres_apellidos'.
    $usutd = $mostrar['tipo_documento']; // Obtiene el valor del campo 'tipo_documento'.
    $usucorreo = $mostrar['email']; // Obtiene el valor del campo 'email'.
    $usugenero = $mostrar['genero']; // Obtiene el valor del campo 'genero'.
}
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
    <link rel="stylesheet" href="style.css"> <!-- Enlaza a un archivo de hoja de estilo CSS llamado "style.css". -->
    <title>VER USUARIO</title>
</head>

<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POST">
            <table>
                <tr>
                    <th colspan="2">Ver usuario</th> <!-- Título de la página para ver un usuario. -->
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><?php echo $usunom; ?></td> <!-- Muestra el nombre del usuario. -->
                </tr>
                <tr>
                    <td>Documento: </td>
                    <td><?php echo $usudocumento; ?></td> <!-- Muestra el documento del usuario. -->
                </tr>

                <tr>
                    <td>Tipo de documento: </td>
                    <td><?php echo $usutd; ?></td> <!-- Muestra el tipo de documento del usuario. -->
                </tr>
                <tr>
                    <td>Género: </td>
                    <td><?php echo $usugenero; ?></td> <!-- Muestra el género del usuario. -->
                </tr>
                <tr>
                    <td>Correo: </td>
                    <td><?php echo $usucorreo; ?></td> <!-- Muestra el correo del usuario. -->
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo "<a href=\"index.php?pag=$pagina\">Regresar</a>"; ?> <!-- Enlace para regresar a la página anterior. -->
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
