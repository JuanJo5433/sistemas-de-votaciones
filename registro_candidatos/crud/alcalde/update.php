<?php
include("../../../config/conexion.php"); //conexion con la BD
require_once '../../../config/validate_session.php'; //permite validar sesion
require ('../../../config/control_acces.php'); //controla el acceso
require('../../../config/validate_type_user.php'); //valida el tipo de usuario
$connect = connection();

//Almacena los datos de cada campo
$id_candidato = $_POST['id_candidato_alcalde'];
$nombre = $_POST['nombres_apellidos'];
$tipo_documento = $_POST['tipo_documento'];
$documento = $_POST['documento'];
$email = $_POST['email'];

// Verificamos si se cargó un nuevo archivo de imagen
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $actualizar = "UPDATE candidatos_alcalde SET nombre_completo = '$nombre', tipo_documento = '$tipo_documento', documento = '$documento', email = '$email', image = '$image' WHERE id_candidato_alcalde = '$id_candidato'";
} else {
    $actualizar = "UPDATE candidatos_alcalde SET nombre_completo = '$nombre', tipo_documento = '$tipo_documento', documento = '$documento', email = '$email' WHERE id_candidato_alcalde = '$id_candidato'";
}

$solicitud = mysqli_query($connect, $actualizar);

//mensajes de alerta
if ($solicitud) {
    header("Location: mostrar.php");
    exit();
} else {
    echo "Error al actualizar los datos: " . mysqli_error($connect);
}

mysqli_close($connect);
?>
