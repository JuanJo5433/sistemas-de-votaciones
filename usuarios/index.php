<?php
include_once('../config/conexion.php');  // Incluye el archivo de configuración para la conexión a la base de datos.
require('../config/validate_type_user.php');  // Requiere un archivo para validar el tipo de usuario.
$conn = connection(); // Llama a la función para obtener la conexión a la base de datos.
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
    <link rel="stylesheet" type="text/css" href="css/style_.css"> <!-- Enlaza a un archivo CSS llamado "style_.css". -->
    <title>Candidatos</title> <!-- Título de la página web. -->
</head>

<body>
    <?php
    $filasmax = 5;  // Establece el número máximo de filas por página.

    if (isset($_GET['pag'])) {
        $pagina = $_GET['pag'];  // Obtiene el valor del parámetro 'pag' de la URL.
    } else {
        $pagina = 1;  // Página por defecto si 'pag' no está definido.
    }

    if (isset($_POST['btnbuscar'])) {
        $buscar = $_POST['txtbuscar'];  // Obtiene el valor del campo de búsqueda en el formulario.
        $sqlusu = mysqli_query($conn, "SELECT * FROM usuarios where documento = '" . $buscar . "'");  // Ejecuta una consulta SQL para buscar usuarios por documento.
    } else {
        $inicio = ($pagina - 1) * $filasmax;
        $sqlusu = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY documento ASC LIMIT $inicio, $filasmax");  // Consulta SQL para obtener usuarios por páginas.
    }

    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_usuarios FROM usuarios");
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_usuarios'];  // Obtiene el número total de usuarios.
    ?>
    <div class="cont">
        <form method="POST">
            <h1>Lista de usuarios</h1>
            <a href="index.php">Inicio</a>
            <a href="crear.php?pag=<?php echo $pagina; ?>">Crear usuario</a>
            <input type="submit" value="Buscar" name="btnbuscar">
            <input type="text" name="txtbuscar" placeholder="Ingresar Documento de usuario" autocomplete="off" style="width:20%">
            <a href="../votaciones/index_admin.php">Salir</a>
        </form>
        <table>
            <tr>
                <th>Documento</th>
                <th>nombres_apellidos</th>
                <th>Tipo de documento</th>
                <th>email</th>
                <th>genero</th>
                <th>Acciones</th>
            </tr>

            <?php
            while ($mostrar = mysqli_fetch_assoc($sqlusu)) {
                echo "<tr>";
                echo "<td>" . $mostrar['documento'] . "</td>";  // Muestra el valor del campo 'documento'.
                echo "<td>" . $mostrar['nombres_apellidos'] . "</td>";  // Muestra el valor del campo 'nombres_apellidos'.
                echo "<td>" . $mostrar['tipo_documento'] . "</td>";  // Muestra el valor del campo 'tipo_documento'.
                echo "<td>" . $mostrar['email'] . "</td>";  // Muestra el valor del campo 'email'.
                echo "<td>" . $mostrar['genero'] . "</td>";  // Muestra el valor del campo 'genero'.
                echo "<td style='width:24%'>
                <a href=\"ver.php?documento=" . $mostrar['documento'] . "&pag=$pagina\">Ver</a>  <!-- Enlace para ver detalles del usuario. -->
                <a href=\"editar.php?documento=" . $mostrar['documento'] . "&pag=$pagina\">Modificar</a>  <!-- Enlace para modificar el usuario. -->
                <a href=\"eliminar.php?documento=" . $mostrar['documento'] . "&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a " . $mostrar['nombres_apellidos'] . "?')\">Eliminar</a>  <!-- Enlace para eliminar el usuario con confirmación. -->
                </td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div style='text-align:right'>
            <br>
            <?php echo "Total de usuarios: " . $maxusutabla; ?> <!-- Muestra el total de usuarios en la tabla. -->
        </div>
    </div>
    <div style='text-align:right'>
        <br>
    </div>
    <div style="text-align:center">
        <?php
        if (isset($_GET['pag'])) {
            if ($_GET['pag'] > 1) {
        ?>
                <a href="index.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a> <!-- Enlace a la página anterior si existe. -->
            <?php
            } else {
            ?>
                <a href="#" style="pointer-events: none">Anterior</a> <!-- Enlace deshabilitado si no hay página anterior. -->
            <?php
            }
        } else {
            ?>
            <a href="#" style="pointer-events: none">Anterior</a> <!-- Enlace deshabilitado si no hay página anterior. -->
            <?php
        }

        if (isset($_GET['pag'])) {
            if (($pagina * $filasmax) < $maxusutabla) {
            ?>
                <a href="index.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a> <!-- Enlace a la página siguiente si existe. -->
            <?php
            } else {
            ?>
                <a href="#" style="pointer-events: none">Siguiente</a> <!-- Enlace deshabilitado si no hay página siguiente. -->
            <?php
            }
        } else {
            ?>
            <a href="index.php?pag=2">Siguiente</a> <!-- Enlace a la segunda página si no se especifica una página. -->
        <?php
        }
        ?>
    </div>
</body>

</html>