<?php
require_once '../../../config/conexion.php';
require('../../../config/conexion.php');
session_start();

$conector = connection();

$id_candidato = $_POST['candidato'];
$documento = $_SESSION["documento"];

$checkUser = "SELECT documento FROM usuarios WHERE documento = '$documento'";
$resultUser = $conector->query($checkUser);

if ($resultUser->num_rows > 0) {
    $checkCandidato = "SELECT id_candidato FROM votos_gobernador WHERE id_candidato = '$id_candidato'";
    $resultCandidatoGobernador = $conector->query($checkCandidato);

    $insertarRegistro = "INSERT INTO votacion_gobernador (id_candidato_gobernador, id_usuario) VALUES ('$id_candidato', '$documento')";
    $resultado = $conector->query($insertarRegistro);

    if (($resultado) && ($resultCandidatoGobernador->num_rows == 0)){
        $insertarVoto = "INSERT INTO votos_gobernador (id_candidato, cantidad_votos) VALUES ('$id_candidato', '1')";
        $resultado = $conector->query($insertarVoto);
        $cambiarEstadoVoto = "UPDATE usuarios SET voto_gobernador = TRUE WHERE documento = $documento";
        $conector->query($cambiarEstadoVoto);
        echo "Voto agregado con éxito.";
        echo '<script type="text/javascript">
            alert("VOTO REGISTRADO CORRECTAMENTE");
            window.location.href="../../index.php";
            </script>';
    } elseif ($resultCandidatoGobernador->num_rows > 0){
        $agregarVoto = "UPDATE votos_gobernador SET cantidad_votos = cantidad_votos + 1 WHERE id_candidato = $id_candidato";
        if ($conector->query($agregarVoto) === TRUE) {
            $cambiarEstadoVoto = "UPDATE usuarios SET voto_gobernador = TRUE WHERE documento = $documento";
            $conector->query($cambiarEstadoVoto);
            echo "Voto agregado con éxito.";
            echo '<script type="text/javascript">
                alert("VOTO REGISTRADO CORRECTAMENTE");
                window.location.href="../../index.php";
                </script>';
        } else {
            echo "Error al agregar el voto: " . $conector->error;
        }
    } else {
        echo "Error al agregar el voto: " . $conector->error;
    }
} else {
    echo 'El usuario no existe';
}
?>
