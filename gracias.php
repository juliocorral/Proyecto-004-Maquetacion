<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias</title>
</head>
<body>
    <h1>Gracias por tu mensaje</h1>
    <p>Hola, <?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : 'Amigo'; ?>. Tu mensaje ha sido recibido correctamente.</p>
</body>
</html>