<?php
// Aquí puedes gestionar el formulario enviado desde index.html

// 3.- Procesar los datos
// 4.- Enviar una respuesta al usuario

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
if (strlen($nombre) < 3 || strlen($nombre) > 30) {
    $errores[] = "El nombre debe tener entre 3 y 30 caracteres.";
    header('location:/?error=nombre');
    die;
}
//if (!preg_match('/^[0-9]{9}$/', $telefono)) {
if (!preg_match("/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/", $telefono)) {
    $errores[] = "El teléfono no tiene un formato válido.";
    header('location:/?error=telefono');
    die;
}
$regexpEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
if (!preg_match($regexpEmail, $email)) {
    $errores[] = "El correo electrónico no tiene un formato válido.";
    header('location:/?error=email');
    die;
}
/*
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
    header('location:/?error=email');
    die;
}
*/
if (strlen($mensaje) < 3 || strlen($mensaje) > 200) {
    $errores[] = "El mensaje debe tener entre 3 y 200 caracteres.";
    header('location:/?error=mensaje');
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
?>