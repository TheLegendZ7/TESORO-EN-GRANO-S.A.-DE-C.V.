<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Datos del destinatario y asunto
    $destinatario = "bzuleta777@gmail.com";
    $asunto = "Nueva Cotización de " . $nombre;

    // Cuerpo del correo
    $cuerpo = "Has recibido una nueva cotización.\n\n";
    $cuerpo .= "Nombre: " . $nombre . "\n";
    $cuerpo .= "Correo Electrónico: " . $email . "\n";
    $cuerpo .= "Teléfono: " . $telefono . "\n";
    $cuerpo .= "Mensaje:\n" . $mensaje . "\n";

    // Configurar headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Enviar correo
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        // Redirigir a la misma página mostrando el mensaje de éxito
        echo "<h2>¡Tu cotización ha sido enviada exitosamente!</h2>";
        echo "<p>Nos pondremos en contacto contigo lo antes posible.</p>";
        echo "<button onclick=\"window.location.href='cafe4.html'\">Realizar otra cotización</button>";
    } else {
        echo "<h2>Hubo un problema al enviar tu cotización.</h2>";
        echo "<p>Por favor, intenta nuevamente más tarde.</p>";
    }
}
?>
