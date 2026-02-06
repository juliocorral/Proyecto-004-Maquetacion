<?php
require_once '../vendor/autoload.php'; 
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

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

$ip = $_SERVER['REMOTE_ADDR'];
$fecha = date('Y-m-d H:i:s');

// 2.- Validar los datos
$errores = [];
if (comprobarVacio($nombre)) {
    $errores[] = "El nombre es obligatorio.";
    header("location:/index.php?error=vacio&campo=nombre&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}
if (comprobarCaracteres($nombre, 3, 30)) {
    $errores[] = "El nombre debe tener entre 3 y 30 caracteres.";
    header("location:/index.php?error=corto&campo=nombre&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}

if (comprobarVacio($telefono)) {
    $errores[] = "El teléfono es obligatorio.";
    header("location:/index.php?error=vacio&campo=telefono&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}
//if (!preg_match('/^[0-9]{9}$/', $telefono)) {
/*
if (!preg_match("/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/", $telefono)) {
    $errores[] = "El teléfono no tiene un formato válido.";
    header('location:/index.php?error=telefonoFormato');
    die;
}
*/

if (comprobarVacio($email)) {
    $errores[] = "El correo electrónico es obligatorio.";
    header("location:/index.php?error=vacio&campo=email&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}
if (!comprobarEmail($email)) {
    $errores[] = "El correo electrónico no tiene un formato válido.";
    header("location:/index.php?error=formato&campo=email&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}
/*
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
    header('location:/index.php?error=email');
    die;
}
*/

if (comprobarCaracteres($mensaje, 10, 200)) {
    $errores[] = "El mensaje debe tener entre 10 y 200 caracteres.";
    header("location:/index.php?error=corto&campo=mensaje&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}

if (!$aceptar) {
    $errores[] = "Debes aceptar los términos y condiciones.";
    header("location:/index.php?error=aceptar&campo=condiciones&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}

if ($respUser !== $respSystem || empty($respUser)) {
    $errores[] = "La respuesta a la pregunta de seguridad es incorrecta.";
    header("location:/index.php?error=error&campo=captcha&nombre=$nombre&telefono=$telefono&email=$email&mensaje=$mensaje");
    die;
}

if (!empty($errores)) {
    // Si hay errores, mostrar mensajes de error
    foreach ($errores as $error) {
        echo "<p>Error: $error</p>";
    }
    exit;
}

// 3.- Enviar una respuesta al la empresa y al usuario

// 3.1.- Enviar un correo electrónico con los datos del formulario a la empresa
$urlWeb='https://localhost:3000';
$correoEmisor = $_ENV['EMAIL_WEB']; // correo del remitente (de la web)
$nombreEmisor = 'Web Panadería'; // nombre del remitente (de la web)
$correoDestinatario = $_ENV['EMAIL_ADMIN']; // correo del destinatario (administrador)
$nombreDestinatario = 'Julio Corral'; // nombre del destinatario (administrador)
$asunto = 'Nuevo mensaje desde el formulario de contacto de ' . $nombre;

$html = file_get_contents('./templates/artform01.html');

$vars = [
    '{encabezado}' => 'Nuevo mensaje de contacto',
    '{texto_cabecera}' => 'Se ha recibido un nuevo mensaje con los siguientes datos:',    
    '{nombre}' => htmlspecialchars($nombre),  
    '{telefono}' => htmlspecialchars($telefono),
    '{email}' =>  htmlspecialchars($email),
    '{mensaje}' => nl2br(htmlspecialchars($mensaje)),
    '{texto_pie}' => 'Este mensaje se generó automáticamente desde el sitio web. Responde directamente al remitente si necesitas contactarlo.',
    '{ip}' => $ip,
    '{fecha}' => $fecha
];

$cuerpo = str_replace(array_keys($vars), array_values($vars), $html);

// Para ver como llegaría el email
// echo $cuerpo; die;

include './envioPhpMailer.php';

// 3.2.- Enviar un correo electrónico al usuario confirmando la recepción del mensaje
$urlWeb='https://localhost:3000';
$correoEmisor = $_ENV['EMAIL_WEB']; // correo del remitente (de la web)
$nombreEmisor = 'Web Panadería'; // nombre del remitente (de la web)
$correoDestinatario = $email; // correo del destinatario (administrador)
$nombreDestinatario = $nombre; // nombre del destinatario (administrador)
$asunto = $nombre . 'Mensaje recibido'; 

$html = file_get_contents('./templates/artform01.html');

$vars = [
    '{encabezado}' => 'Solicitud recibida',
    '{texto_cabecera}' => 'Se ha recibido su mensaje con los siguientes datos:',    
    '{nombre}' => htmlspecialchars($nombre),  
    '{telefono}' => htmlspecialchars($telefono),
    '{email}' =>  htmlspecialchars($email),
    '{mensaje}' => nl2br(htmlspecialchars($mensaje)),
    '{texto_pie}' => 'Este mensaje se generó automáticamente desde el sitio web. En breve recibirás una respuesta.',
    '{ip}' => $ip,
    '{fecha}' => $fecha
];

$cuerpo = str_replace(array_keys($vars), array_values($vars), $html);

// Para ver como llegaría el email
// echo $cuerpo; die;

include './envioPhpMailer.php';

// 4.- Guardar los datos en la base de datos.

// 4.1 - Conectar con la base de datos
$con = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

// 4.2 - Comprobar la conexión
if (!$con) {
    error_log("Error al conectar con la base de datos: " . mysqli_connect_error());
} else {
    // 4.3 - Insertar los datos en la tabla correspondiente
    $con->set_charset("utf8mb4");
    $sql = "INSERT INTO consultas (nombre, telefono, email, mensaje, ip, fecha) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        error_log("Error al preparar la consulta: " . mysqli_error($con));
    } else {    
        mysqli_stmt_bind_param($stmt, "ssssss", $nombre, $telefono, $email, $mensaje, $ip, $fecha);
        if (!mysqli_stmt_execute($stmt)) {
            error_log("Error al insertar los datos: " . mysqli_stmt_error($stmt));
        }
        mysqli_stmt_close($stmt);
    }
    // 4.4 - Cerrar la conexión
    mysqli_close($con);
}

// 5.- Redirigir a una página de gracias
header('location:/gracias.php?nombre=' . urlencode($nombre));
?>