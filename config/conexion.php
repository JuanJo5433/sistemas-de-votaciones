<?php

// Verifica si hay una funcion llamada connection.

if (!function_exists('connection')) {

    // Se define la funcion connection.
    function connection(){ 

        // Valores para poder conectarse a la base de datos MySQL.

        $local = "localhost"; // Nombre del host de la base de datos MySQL. 
        $usuario = "root"; // Nombre de usuario de la base de datos MySQL.
        $password = ""; 
        $base_de_datos = "votaciones"; // Nombre de la base de datos. 

        // Se hace la conexion con la base de datos MySQL.
        $conector = mysqli_connect($local, $usuario, $password);
        mysqli_select_db($conector, $base_de_datos); // Se selecciona la base de datos que se desea conectar.

        // Se retorna la conexion con la base de datos MySQL.
        return $conector;
    }
}

?>