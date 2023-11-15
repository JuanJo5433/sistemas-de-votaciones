<?php
require('../../config/conexion.php');
require_once '../../config/validate_session.php';
require_once '../../get/get_candidatos_alcalde.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8"><!--Permite caracteres especiales-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones"> <!--descripcion de la pagina-->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal"><!--Palabras claves de la pagina-->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver Alvarez, Yurany Henao"> <!--Autores de la pagina-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <link rel="stylesheet" type="text/css" href="css/estilo_tiposvotaciones.css"> <!--Archivo de tipo css-->
    <script src="js/scripts.js"></script>
    <title>Votaciones Alcaldía</title>
</head>

<body>
    <p>Bienvenido... <?php echo $_SESSION["nombres_apellidos"]; ?></p>
    <div class="btn-atras">
        <a href="../index.php">
            <button href='../index.php'>
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                <span>Volver</span>
            </button>
        </a>
    
    </div>

    <form id="votingForm" method="post" action="procesar_votos/procesar_voto_alcalde.php">
        <input type="hidden" name="tipo_formulario" value="alcaldia">

        <div class="container">
            <?php
            if (!empty($candidatos)) {
                foreach ($candidatos as $candidato) {
                    $id = $candidato["id_candidato_alcalde"];
                    $nombre = $candidato["nombre_completo"];
                    $foto = $candidato["image"];

                    echo '<label for="candidato', $id, '" class="tarjet">';
                    echo '<input type="radio" name="candidato" value="', $id, '" id="candidato', $id, '" class="option-input radio" required>';
                    echo '<h2>', $nombre, '</h2>';

                    if (!empty($foto)) {
                        $base64Image = base64_encode($foto);
                        $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                        echo '<img src="', $imageSrc, '" alt="', $nombre, '">';
                    } else {
                        echo 'Imagen no disponible';
                    }

                    echo '</label>';
                }
            } else {
                echo "No se encontraron candidatos en la base de datos.";
            }
            ?>

           
            <div class="btn-votar">
                <button type="submit" id="btn_Validar" disabled>
                    <div class="svg-wrapper-1">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                            </svg>
                        </div>
                    </div>
                    <span>VOTAR</span>
                </button>
            </div>
        </div>
    </form>

    <script>
        const votingForm = document.getElementById("votingForm");
        const submitButton = document.getElementById("btn_Validar");

        votingForm.addEventListener("submit", function (e) {
            e.preventDefault(); // Previene el envío del formulario

            const selectedOption = document.querySelector('input[name="candidato"]:checked');
            if (selectedOption) {
                // Obtener el nombre del candidato seleccionado
                const candidatoNombre = selectedOption.parentElement.querySelector('h2').textContent;
                // Mostrar la confirmación con el nombre del candidato
                const respuesta = confirm("¿Deseas votar por " + candidatoNombre + "?");
                if (respuesta) {
                    votingForm.submit(); // Enviar el formulario si el usuario acepta
                }
            } else {
                alert("Debes seleccionar un candidato antes de votar.");
            }
        });

        votingForm.addEventListener("change", function () {
            const selectedOption = document.querySelector('input[name="candidato"]:checked');
            if (selectedOption) {
                submitButton.removeAttribute("disabled");
            } else {
                submitButton.setAttribute("disabled", "disabled");
            }
        });
    </script>
</body>

</html>