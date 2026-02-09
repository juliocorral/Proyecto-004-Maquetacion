<?php

// Prueba FALLO
$mensaje = "fallo en matrix";
$fallo = true;

// Prueba ÉXITO
$mensaje = "<h3>¡Gracias por contactar con nosotros!</h3> <p>Hemos recibido tu mensaje y nos pondremos en contacto contigo lo antes posible.</p>";
$fallo = false;

// Creación de array asociativo
$arrayRespuesta = array(
    "mensaje" => $mensaje,
    "fallo" => $fallo
);

// Devuelvo el array como JSON
echo json_encode($arrayRespuesta);

?>