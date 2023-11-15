<?php
include_once('../config/conexion.php');  // Incluye el archivo de configuración para la conexión a la base de datos.
require('../config/validate_type_user.php');  // Requiere un archivo para validar el tipo de usuario.
$conn = connection(); // Llama a la función para obtener la conexión a la base de datos.
include_once("index.php");  // Incluye el archivo "index.php".

$pagina = $_GET['pag'];  // Obtiene el valor del parámetro 'pag' de la URL.
$coddni = $_GET['documento']; // Cambió el nombre de la variable de $coddocumento a $coddni.

mysqli_query($conn, "DELETE FROM usuarios WHERE documento=$coddni"); // Ejecuta una consulta SQL para eliminar un usuario con el documento proporcionado ($coddni) de la base de datos.

header("Location:index.php?pag=$pagina");  // Redirige a la página "index.php" con el valor de 'pagina' en la URL.
?>
