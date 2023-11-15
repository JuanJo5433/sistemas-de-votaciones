<?php
require_once '../../config/validate_session.php';
// Configuracion de la conexion MySQL.

include("../../config/conexion.php");
$conector = connection(); // Llama a la función para obtener la conexión.


// Se declaran las variables que almacenaran los datos del candidato. 

$id_candidato_alcalde = NULL;
$nombres_apellidos = $_POST['nombres_apellidos'];
$tipo_documento = $_POST['tipo_documento'];
$documento = $_POST['documento'];
$email = $_POST['email'];
$tipo_candidato = $_POST['tipo_candidato'];

// Se verifica que se ha subido una imagen con formato valido.

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));



    // Se insertan los datos del candidato a alcalde en la base de datos.

    if ($tipo_candidato == "Alcalde"){
        $insertar = "INSERT INTO candidatos_alcalde(nombre_completo, tipo_documento, documento, email, image) VALUES('$nombres_apellidos','$tipo_documento','$documento','$email','$image')";
        $resultado = $conector->query($insertar);
       
        if ($resultado){
            $id_candidato_alcalde = $conector->insert_id; // Obtén el último ID insertado
            $insertarVoto = "INSERT INTO votos_alcalde (id_candidato, cantidad_votos) VALUES ('$id_candidato_alcalde', '0')";
            $resultado1 = $conector->query($insertarVoto);
            echo 'Se ha insertado el candidato Alcalde correctamente';
            header('Location: ../index.php');
        }else{
            echo 'No se pudo insertar el candidato Alcalde';
        } 

    // Se insertan los datos del candidato a gobernador en la base de datos.

    }elseif ($tipo_candidato == "Gobernador"){
        $insertar = "INSERT INTO candidatos_gobernador(nombre_completo, tipo_documento, documento, email, image) VALUES('$nombres_apellidos','$tipo_documento','$documento','$email','$image')";
        $resultado = $conector->query($insertar);

        if ($resultado){
            $id_candidato_gobernador = $conector->insert_id; // Obtén el último ID insertado
            $insertarVoto = "INSERT INTO votos_gobernador (id_candidato, cantidad_votos) VALUES ('$id_candidato_gobernador', '0')";
            $resultado1 = $conector->query($insertarVoto);
            echo 'Se ha insertado el candidato Gobernador correctamente';
            header('Location: ../index.php');
        }else{
            echo 'No se pudo insertar el candidato Gobernador';
        }   
        
    // Se insertan los datos del candidato a junta de accion comunal en la base de datos.

    }elseif($tipo_candidato == "Junta de Accion Comunal"){
        $insertar = "INSERT INTO candidatos_jac(nombre_completo, tipo_documento, documento, email, image) VALUES('$nombres_apellidos','$tipo_documento','$documento','$email','$image')";
        $resultado = $conector->query($insertar);

        if ($resultado){
            $id_candidato_jac = $conector->insert_id; // Obtén el último ID insertado
            $insertarVoto = "INSERT INTO votos_jac (id_candidato, cantidad_votos) VALUES ('$id_candidato_jac', '0')";
            $resultado1 = $conector->query($insertarVoto);
            echo 'Se ha insertado el candidato de Junta de Acción Comunal correctamente';
            header('Location: ../index.php');
        }else{
            echo 'No se pudo insertar el candidato de Junta de Acción Comunal';
        }   
        
    // Se insertan los datos del candidato a represenante sena en la base de datos.

    }elseif($tipo_candidato == "Representante Sena"){
        $insertar = "INSERT INTO candidatos_representante_sena(nombre_completo, tipo_documento, documento, email, image) VALUES('$nombres_apellidos','$tipo_documento','$documento','$email','$image')";
        $resultado = $conector->query($insertar);

        if ($resultado){
            $id_candidato_representante_sena = $conector->insert_id; // Obtén el último ID insertado
            $insertarVoto = "INSERT INTO votos_representante_sena (id_candidato, cantidad_votos) VALUES ('$id_candidato_representante_sena', '0')";
            $resultado1 = $conector->query($insertarVoto);
            echo 'Se ha insertado el candidato Representante Sena correctamente';
            header('Location: ../index.php');
        }else{
            echo 'No se pudo insertar el candidato Representante Sena';
        }    

    }else{
        echo 'ERROR: Tipo de candidato no reconocido';
    }
    
} else {
    echo 'ERROR: No se ha subido un archivo de imagen válido o el archivo está vacío.';
}


?>
