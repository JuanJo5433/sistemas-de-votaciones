<?php
require_once '../../../config/conexion.php'; // 
require('../../../config/conexion.php');
session_start();

$conector = connection();

$id_candidato = $_POST['candidato'];
$documento = $_SESSION["documento"];

$checkUser = "SELECT documento FROM usuarios WHERE documento = '$documento'";
$resultUser = $conector->query($checkUser);

if ($resultUser->num_rows > 0) {
    $checkCandidato = "SELECT id_candidato FROM votos_alcalde WHERE id_candidato = '$id_candidato'";
    $resultCandidatoAlcalde = $conector->query($checkCandidato);

    $insertarRegistro = "INSERT INTO votacion_alcalde (id_candidato_alcalde, id_usuario) VALUES ('$id_candidato', '$documento')";
    $resultado = $conector->query($insertarRegistro);

    if ($resultado && $resultCandidatoAlcalde->num_rows == 0) {
        $insertarVoto = "INSERT INTO votos_alcalde (id_candidato, cantidad_votos) VALUES ('$id_candidato', '1')";
        $resultado = $conector->query($insertarVoto);

        echo "Voto agregado con éxito.";

        $cambiarEstadoVoto = "UPDATE usuarios SET voto_alcalde = TRUE WHERE documento = $documento";
        $conector->query($cambiarEstadoVoto);

        echo '<script type="text/javascript">
            alert("VOTO REGISTRADO CORRECTAMENTE");
            window.location.href="../../index.php";
            </script>';
    } elseif ($resultCandidatoAlcalde->num_rows > 0) {
        $agregarVoto = "UPDATE votos_alcalde SET cantidad_votos = cantidad_votos + 1 WHERE id_candidato = $id_candidato";

        if ($conector->query($agregarVoto) === TRUE) {
            echo "Voto agregado con éxito.";

            $cambiarEstadoVoto = "UPDATE usuarios SET voto_alcalde = TRUE WHERE documento = $documento";
            $conector->query($cambiarEstadoVoto);

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
