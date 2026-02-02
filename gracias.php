<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="icon" type="image/svg+xml" href="/vite.svg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>proyecto-004-maquetacion</title>
    </head>
    <body>
        <nav>

        </nav>
        <header>
            <h1>(h1) Panadería en Riberas de Loiola</h1>
            <h2>¡Gracias por contactarnos, <?php echo htmlspecialchars($_GET['nombre']); ?>!</h2>
            <p>Hemos recibido tu mensaje y nos pondremos en contacto contigo lo antes posible.<br>Mientras tanto, te invitamos a explorar nuestro sitio web para conocer más sobre nuestros productos y servicios.<br>
            <a href="/index.html">Volver a la página principal</a></p>
        </header>
        <footer>
            <p>&copy; 2025 Maquetación. Todos los derechos reservados.</p>
        </footer>


        <script type="module" src="/src/main.js"></script>
  </body>
</html>
