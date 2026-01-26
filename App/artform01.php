<?php
//Incluir recursos
include_once '../config/helpers.php';

// Aquí puedes gestionar el formulario enviado desde index.html

// 1.- Recibir los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$aceptar = isset($_POST['aceptar']) ? true : false;
$respUser = $_POST['respuesta'];
$respSystem = $_POST['respSystem'];

// 2.- Validar los datos
$errores = [];
if (comprobarVacio($nombre)) {
    $errores[] = "El nombre es obligatorio.";
    header('location:/?error=nombreVacio');
    die;
}
if (comprobarCaracteres($nombre, 3, 30)) {
    $errores[] = "El nombre debe tener entre 3 y 30 caracteres.";
    header('location:/?error=nombreCorto');
    die;
}

if (comprobarVacio($telefono)) {
    $errores[] = "El teléfono es obligatorio.";
    header('location:/?error=telefonoVacio');
    die;
}
//if (!preg_match('/^[0-9]{9}$/', $telefono)) {
if (!preg_match("/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/", $telefono)) {
    $errores[] = "El teléfono no tiene un formato válido.";
    header('location:/?error=telefonoFormato');
    die;
}

if (comprobarVacio($email)) {
    $errores[] = "El correo electrónico es obligatorio.";
    header('location:/?error=emailVacio');
    die;
}
if (!comprobarEmail($email)) {
    $errores[] = "El correo electrónico no tiene un formato válido.";
    header('location:/?error=emailFormato');
    die;
}
/*
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
    header('location:/?error=email');
    die;
}
*/

if (comprobarCaracteres($mensaje, 10, 200)) {
    $errores[] = "El mensaje debe tener entre 10 y 200 caracteres.";
    header('location:/?error=mensajeCorto');
    die;
}

if (!$aceptar) {
    $errores[] = "Debes aceptar los términos y condiciones.";
    header('location:/?error=condiciones');
    die;
}

if ($respUser !== $respSystem || empty($respUser)) {
    $errores[] = "La respuesta a la pregunta de seguridad es incorrecta.";
    header('location:/?error=captcha');
    die;
}

if (!empty($errores)) {
    // Si hay errores, mostrar mensajes de error
    foreach ($errores as $error) {
        echo "<p>Error: $error</p>";
    }
    exit;
}

// 3.- Enviar una respuesta al usuario
//header('location:/gracias.php?nombre=' . urlencode($nombre));

// 4.- Enviar un correo electrónico con los datos del formulario
$correoEmisor = $_ENV['EMAIL_WEB']; // correo del remitente (de la web)
$nombreEmisor = 'Web Panadería'; // nombre del remitente (de la web)
$correoDestinatario = $_ENV['EMAIL_ADMIN']; // correo del destinatario (administrador)
$nombreDestinatario = 'Julio Corral'; // nombre del destinatario (administrador)
$asunto = 'Nuevo mensaje desde el formulario de contacto de' . $nombre;
$cuerpo = "<h2>Nuevo mensaje recibido desde el formulario de contacto</h2>
<p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
<p><strong>Teléfono:</strong> " . htmlspecialchars($telefono) . "</p>
<p><strong>Correo electrónico:</strong> " . htmlspecialchars($email) . "</p>
<p><strong>Mensaje:</strong><br>" . nl2br(htmlspecialchars($mensaje)) . "</p>
";
$aviso = "<p>Se ha enviado un nuevo mensaje desde el formulario de contacto.</p>";

include_once './App/envioPhpMailer.php';

?>