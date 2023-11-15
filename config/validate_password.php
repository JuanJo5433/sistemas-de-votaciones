<?php

// Se define la funcion validar clave la cual tiene dos parametros: 
// Clave que se quiere verificar.
// Variable para almacenar el mensaje de error si la clave no cumple.
function validar_clave($clave,&$error_clave){

   // Se verifica que la clave tenga seis caracteres de lo contrario retorna un mensaje de error.

    if(strlen($clave) < 6){
       $error_clave = "La clave debe tener al menos 6 caracteres";
       return false;
    }

   // Se verifica que la clave no tenga mas de 16 caracteres de lo contrario retorna un mensaje de error.

    if(strlen($clave) > 16){
       $error_clave = "La clave no puede tener más de 16 caracteres";
       return false;
    }

   // Se verifica que la clave tenga por lo menos una letra minuscula de lo contrario retorna un mensaje de error.

    if (!preg_match('`[a-z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra minúscula";
       return false;
    }

   // Se verifica que la clave tenga por lo menos una letra mayuscula de lo contrario retorna un mensaje de error.

    if (!preg_match('`[A-Z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra mayúscula";
       return false;
    }

   // Se verifica que la clave tenga por lo menos un caracter numerico de lo contrario retorna un mensaje de error.

    if (!preg_match('`[0-9]`',$clave)){
       $error_clave = "La clave debe tener al menos un caracter numérico";
       return false;
    }

   // Se establece el valor de la variable error_clave, si queda vacia retorna true.

    $error_clave = "";
    return true;
 }
?>