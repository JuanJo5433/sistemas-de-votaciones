<?php
include("../../../config/conexion.php"); //Conexion con la BD
require_once '../../../config/validate_session.php'; //Permite validar el inicio de sesion
require ('../../../config/control_acces.php'); //Controla el acceso
require('../../../config/validate_type_user.php'); //Valida el tipo de usuario
$connect = connection();

//Permite obtener la informacion de cada uno de los campos
$id_candidato = $_POST['id_candidato_jac'];
$nombre = $_POST['nombres_apellidos'];
$tipo_documento = $_POST['tipo_documento'];
$documento = $_POST['documento'];
$email = $_POST['email'];

// Verificamos si se cargó un nuevo archivo de imagen
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $actualizar = "UPDATE candidatos_jac SET nombre_completo = '$nombre', tipo_documento = '$tipo_documento', documento = '$documento', email = '$email', image = '$image' WHERE id_candidato_jac = '$id_candidato'";
} else {
    $actualizar = "UPDATE candidatos_jac SET nombre_completo = '$nombre', tipo_documento = '$tipo_documento', documento = '$documento', email = '$email' WHERE id_candidato_jac = '$id_candidato'";
}
//realiza la solicitud en la base de datos
$solicitud = mysqli_query($connect, $actualizar);
 
//Mensajes de alerta
if ($solicitud) {
    header("Location: mostrar.php");
    exit();
} else {
    echo "Error al actualizar los datos: " . mysqli_error($connect);
}

//Finaliza la conexion
mysqli_close($connect);
?>
