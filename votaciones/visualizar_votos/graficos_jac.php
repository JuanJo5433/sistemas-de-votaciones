<?php
// Incluye el archivo de configuración de la base de datos.
include('../../config/conexion.php');
// Requiere la validación de la sesión para asegurarse de que el usuario esté autenticado.
require_once '../../config/validate_session.php';
// Requiere el archivo de control de acceso.
require('../../config/control_acces.php');
// Requiere la validación del tipo de usuario.
require('../../config/validate_type_user.php');
// Establece una conexión a la base de datos.
$conexion = connection();
// Consulta SQL para obtener datos de votos para JAC (Junta de Acción Comunal) y candidatos.
$sql = "SELECT v.id_voto, v.cantidad_votos, c.nombre_completo, c.documento
        FROM votos_jac v
        INNER JOIN candidatos_jac c ON v.id_candidato = c.id_candidato_jac";
// Ejecuta la consulta SQL.
$query = $conexion->query($sql);
// Arreglos para almacenar datos de la consulta.
$labels = [];
$data = [];
$documento = []; // Agregamos un arreglo para almacenar los documentos

// Recorre los resultados de la consulta y almacena los datos en los arreglos.
while ($row = $query->fetch_object()) {
    $labels[] = $row->nombre_completo;
    $data[] = $row->cantidad_votos;
    $documento[] = $row->documento; // Almacenamos los documentos
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"><!--Permite caracteres especiales-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Permite que sea compatible con el navegador de internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Se adapta a los dispositivos-->
    <meta name="description" content="Este es un sitio para votaciones"> <!--descripcion de la pagina-->
    <meta name="keywords" content="registro, elecciones, alcalde, gobernador, representante, sena, junta, comunal"><!--Palabras claves de la pagina-->
    <meta name="author" content="Juan Jose Giraldo, Jhon Faver Alvarez, Yurany Henao"> <!--Autores de la pagina-->
    <link rel="shortcut icon" href="/proyecto_votacion/votaciones/img/icono.png"> <!--Permite añadirle un icono a la pagina-->
    <title>Gráfica de Barra con PHP y MySQL</title>
    <!-- Incluye la biblioteca Chart.js para gráficos. -->
    <script src="../voto/js/chart.min.js"></script> <!--Archivo de tipo js-->
    <link rel="stylesheet" type="text/css" href="css/styletable1.css"> <!--Archivo de tipo css-->
</head>

<body>
    <!-- Botón para volver a la página de visualización de votos. -->
    <div class="btn-atras">
        <a href="../visualizar_votos/index_visualizar.php">
            <button href="../visualizar_votos/index_visualizar.php">
                <!-- Icono SVG para el botón de regreso. -->
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                    <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
                </svg>
                <span>Volver al Menú</span>
            </button>
        </a>
    </div>

    <!-- Tabla para mostrar los votos de JAC. -->
    <div class="table">
        <div id="wrapper">
            <h1>Tabla de votos JAC</h1>
            <table id="keywords" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th><span>Documento</span></th>
                        <th><span>Nombre Completo</span></th>
                        <th><span>Cantidad de Votos</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Recorre los datos y muestra la tabla de votos.
                    foreach ($labels as $key => $label) {
                        echo "<tr>";
                        echo "<td>" . $documento[$key] . "</td>"; // Nuevo campo para el documento
                        echo "<td class='lalign'>" . $label . "</td>";
                        echo "<td>" . $data[$key] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Gráfica de barras para mostrar la cantidad de votos. -->
    <h1>Gráfica de Votos Totales</h1>
    <div class "container">
        <canvas id="chart1"></canvas>
        <script>
            // Configuración de la gráfica utilizando la biblioteca Chart.js.
            var ctx = document.getElementById("chart1").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Cantidad de votos',
                        data: <?php echo json_encode($data); ?>,
                        barPercentage: 0.5,
                        categoryPercentage: 0.7,
                        backgroundColor: 'rgba(56, 152, 219, 0.6)',
                        borderColor: 'rgba(155, 89, 182, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                suggestedMin: 1,
                                suggestedMax: 50,
                                stepSize: 10
                            }
                        }]
                    },
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            fontSize: 14,
                        }
                    },
                }
            });
        </script>
    </div>
</body>

</html>
