<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
include("conexion.php");
session_start();
$conectar = connection(); // Llama a la función de conexión y almacena la conexión en la variable $conectar.

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);


if ($_SERVER["REQUEST_METHOD"] !== "POST" || !$email) {
    // Manejar el error de solicitud no válida o correo electrónico no válido
    header("Location: ../index_login.php?message=invalid_request");
    exit();
}

// Utilizar consultas preparadas para evitar inyecciones SQL
$query = $conectar->prepare("SELECT * FROM usuarios WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();

$resultado = $query->get_result();
$row = $resultado->fetch_assoc();


if ($resultado->num_rows > 0) {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
                           //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'juanjosegiraldo1001@gmail.com';                     //SMTP username
        $mail->Password   = 'JuanJo543.';                               //SMTP password
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('juanjosegiraldo1001@gmail.com', 'Sistema de votacion');
        $mail->addAddress($email, 'user');     //Add a recipient       




        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'RECUPERACION DE PASSWORD';
        $mail->Body = 'Hola, este es un correo generado automáticamente para la recuperación de tu contraseña, por favor, ingresa a la siguiente página <a href="http://localhost/proyecto_votacion/change_password.php?documento=' . htmlspecialchars($row['documento']) . '">Recuperación de contraseña</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
        header("Location: ../index_login.php?message=ok");
        
    } catch (Exception $e) {
        header("Location: ../index_login.php?message=error");

    }
} else {
    header("Location: ../index_login.php?message=not_found");
}
