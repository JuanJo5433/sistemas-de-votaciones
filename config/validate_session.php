<?php

if (session_status() == PHP_SESSION_NONE) {
   // Solo inicia la sesión si no está activa
   session_start();
}

// Luego, puedes verificar si el usuario tiene una sesión establecida.
if (!isset($_SESSION['documento'])) {
  // Redirecciona a la página de inicio de sesión.
  echo '<script type="text/javascript">
     alert("DEBES INICIAR SESIÓN");
     window.location.href="/proyecto_votacion/index_login.php";
     </script>';
}
