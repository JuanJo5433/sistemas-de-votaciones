<?php
require_once('../../../get/get_candidatos_junta_accion_comunal.php'); //Obtiene la informacion del candidato
require_once '../../../config/validate_session.php'; //Valida el inicio de sesion
require ('../../../config/control_acces.php'); //Controla el acceso
require('../../../config/validate_type_user.php'); //Valida el tipo de usuario
?>

<!DOCTYPE html>
<html lang="en"> <!--Idioma de la pagina-->

<head>
    <meta charset="UTF-8"> <!--Permite caracteres especiales-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones"> <!--Descripcion de la pagina-->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal"><!--Palabras claves de lapagina-->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver Alvarez, Yurany Henao"> <!--Autores de la pagina-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <link rel="stylesheet" type="text/css" href="../../css/estilo_mostrar1.css"><!--Archivo tipo css-->
    <title>Mostrar candidatos</title><!--Titulo de la pagina-->
</head>

<body>
    <!--Creacion del boton atras-->
    <div class="btn-atras">
        <a href="../mostrar_candidatos.php"><!--Redirecciona a la interfaz indicada-->
            <button href='mostrar_candidatos.php'>
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                <span>Atras</span>
            </button>
        </a>
    
    </div>
    
    <div class="container">
        <?php
        //Permite visualizar la informacion del candidato
        if (!empty($candidatos)) {
            foreach ($candidatos as $candidato) {
                $id = $candidato["id_candidato_jac"];
                $nombre = $candidato["nombre_completo"];
                $tipo_documento = $candidato["tipo_documento"];
                $documento = $candidato["documento"];
                $email = $candidato["email"];
                $foto = $candidato["image"];
                echo '<div class="tarjet">';
                echo '<div class="content">';
                echo '<h2>' . $nombre . '</h2>';
                if (!empty($foto)) {
                    $base64Image = base64_encode($foto);
                    $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                    echo '<img src="' . $imageSrc . '" alt="' . $nombre . '" class="imagen">';
                } else {
                    echo 'Imagen no disponible';
                }
                echo '</div>';
                echo '<div class="botones">';
                echo '<a href="actualizar.php?id_candidato_jac=' . $id . '" class="btn-gradient">Editar</a>';
                // Agrega la confirmación de eliminación con el nombre del candidato
                echo '<a href="delete.php?id_candidato_jac=' . $id . '" class="btn-gradient" onclick="return confirm(\'¿Estás seguro de eliminar a ' . $nombre . '?\')">Eliminar</a>';
                echo '</div>';
                echo '</div>';
            }
            //mensajes de alerta
        } else {
            echo "No se encontraron candidatos en la base de datos.";
        }
        ?>
    </div>
    <!--Mostrar eventos de alerta-->
    <script>
        document.getElementById('redirectButton').addEventListener('click', function() {
            window.location.href = 'voto/alcaldia.php';
        });
    </script>
</body>


</html>