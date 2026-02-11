<?php
function comprobarVacio($campo) {
    // Comprobar si es vacío (TRUE) o no (FALSE)
    return !isset($campo) || trim($campo) === '' || empty($campo);
}

function comprobarCaracteres($campo, $limiteMin, $limiteMax) {
    // Comprobar si es valor es menor o mayor que el límite
    if (strlen($campo) < $limiteMin || strlen($campo) > $limiteMax) {
        return true; // Fuera de los límites
    }
    return false; // Dentro de los límites
}

function comprobarEmail($campo) {
    $regexpEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    return preg_match($regexpEmail, $campo);
}

function enviarError($mensajeError, $campo) {
    $arrayRespuesta = array(
        "fallo" => true,
        "mensaje" => $mensajeError,
        "campo" => $campo
    );

    echo json_encode($arrayRespuesta);
    die;
}
?>