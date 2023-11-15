<?php 

// Iniciar seccion PHP 
session_start();

// Destruir la seccion PHP, Se usa para cuando el usuario cierre seccion.
session_destroy();

// Redireccionar a la pagina del login.
echo '<script type="text/javascript">
      alert("cerrando sesion...");
      window.location.href="../index_login.php";
      </script>';


?>