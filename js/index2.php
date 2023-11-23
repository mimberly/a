<?php
// Obtener datos del carrito enviados desde el cliente
$data = json_decode(file_get_contents('php://input'), true);
$carritoItems = $data['carritoItems'];

// Construir el mensaje a enviar por correo
$message = "Detalles del carrito:\n";
foreach ($carritoItems as $item) {
    $message .= "Producto: " . $item['titulo'] . ", Precio: " . $item['precio'] . ", Cantidad: " . $item['cantidad'] . "\n";
}

$to = 'lazarteisrael1408@gmail.com'; // Reemplaza con tu dirección de correo
$subject = 'Detalles del carrito de compras';
$headers = 'From: lazarteisrael1408@gmail.com' . "\r\n" .
    'Reply-To: lazarteisrael1408@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Envío del correo
$mailSent = mail($to, $subject, $message, $headers);

// Verificar si el correo se envió correctamente
if ($mailSent) {
    echo 'Correo enviado correctamente';
} else {
    echo 'Error al enviar el correo';
}
?>