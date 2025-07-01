<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de que este sea el path correcto para PHPMailer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gonzalezleonardo2110@gmail.com'; // Tu correo Gmail
        $mail->Password = 'wrcv emqj rmyf srbz'; // Contraseña de aplicación de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinatario
        $mail->setFrom($email, $nombre); // El correo del remitente (usuario del formulario)
        $mail->addAddress('gonzalezleonardo2110@gmail.com', 'Leonardo'); // Tu correo destino

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = "Mensaje de $nombre";
        $mail->Body = "<p><strong>Nombre:</strong> $nombre</p><p><strong>Email:</strong> $email</p><p><strong>Mensaje:</strong><br>$mensaje</p>";
        $mail->AltBody = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";

        $mail->send();

        // Redirigir con mensaje de éxito
        echo "<script>
                alert('Mensaje enviado exitosamente.');
                window.location.href = 'index.html'; // Cambia por la URL de tu página principal
              </script>";
    } catch (Exception $e) {
        // Redirigir con mensaje de error
        echo "<script>
                alert('Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.');
                window.location.href = 'index.html'; // Cambia por la URL de tu página principal
              </script>";
    }
}
?>

