<?php
// Cargamos .env para poder leer APP_ENV en local (dev/prod)
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
    if (class_exists('Dotenv\\Dotenv')) {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->safeLoad();
    }
}

require __DIR__ . '/config/helpers.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="icon" type="image/svg+xml" href="<?php echo vite_public_url('vite.svg'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>proyecto-004-maquetacion</title>
        <?php
            // Inyecta CSS/JS desde Vite (manifest en produccion o /src en desarrollo)
            vite_assets();
        ?>
    </head>
    <body>
        <nav>

        </nav>
        <header>
            <h1>(h1) Panadería en Riberas de Loiola</h1>
        </header>
        <main>
            <!-- Quiénes somos -->
            <section>
                <h2>(h2) Quiénes somos</h2>

                <article class="art001">
                    <h3>(h3) Nuestra panadería</h3>

                    <img 
                    srcset="https://dummyimage.com/500x500 500w,
                             https://dummyimage.com/1800x1100 1800w,
                             https://dummyimage.com/2560x1200 2560w"

                    sizes="(width <= 800px) 600px,
                           (width <= 1500px) 1200px,
                           2560px"

                    src="https://dummyimage.com/500x500"
                    alt="" title="" />

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae deserunt velit ipsa facere laboriosam eum esse minus asperiores numquam quam. Magnam facilis veritatis eligendi illo culpa eaque ex. Ea, laboriosam natus. Odio sequi dolor nisi, aliquam eaque voluptatum aliquid error tempora molestias provident doloremque blanditiis numquam quas alias nostrum neque vel ipsam! Illo, accusantium maiores animi velit molestiae sed nesciunt eum sequi. Quo consectetur alias vel, debitis ab possimus tempora.</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae deserunt velit ipsa facere laboriosam eum esse minus asperiores numquam quam. Magnam facilis veritatis eligendi illo culpa eaque ex. Ea, laboriosam natus.</p>

                    <a href="#" class="boton">CTA</a>
                </article>

                <!-- FICHAS del equipo -->
                <article class="art005">
                    <h3>(h3) Nuestro equipo</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate eum blanditiis iste reprehenderit autem? Debitis est iure ipsa deserunt atque voluptates tenetur dolor vitae animi modi nulla, sint voluptatum dolore ducimus doloremque eos, repudiandae error provident pariatur autem? Illum molestias corporis vitae necessitatibus nihil error suscipit atque omnis pariatur maiores!</p>
                    
                        
                    <div>
                        <div class="ficha">
                            <img src="https://randomuser.me/api/portraits/women/79.jpg" alt="" title="" />
                            <div>
                                <h4>(h5) Nombre Apellido</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, earum.</p>
                                <a href="#">Ver perfil</a>
                            </div>
                        </div>
                        <div class="ficha">
                            <img src="https://randomuser.me/api/portraits/men/81.jpg" alt="" title="" />
                            <div>
                                <h4>(h5) Nombre Apellido</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem!</p>
                                <a href="#">Ver perfil</a>
                            </div>
                        </div>
                        <div class="ficha">
                            <img src="https://randomuser.me/api/portraits/men/68.jpg" alt="" title="" />
                            <div>
                                <h4>(h5) Nombre Apellido</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem!</p>
                                <a href="#">Ver perfil</a>
                            </div>
                        </div>
                        <div class="ficha">
                            <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="" title="" />
                            <div>
                                <h4>(h5) Nombre Apellido</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem!</p>
                                <a href="#">Ver perfil</a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- LISTADO de valores -->
                <article class="art002">
                    <h3>(h3) Nuestros valores</h3>
                    <div>
                        <div class="contenedor-lista">
                            <h4>Atención personalizada</h4>
                            <ul>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="contenedor-lista">
                            <h4>Los mejores ingredientes</h4>
                            <ul>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                                <li>
                                    <img src="<?php echo vite_public_url('resources/checkmark-circle.svg'); ?>" alt="" title="" />
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
            </section>

            <!-- Productos -->
            <section>
                <h2>(h2) Productos</h2>

                <!-- GRID de imágenes de productos -->
                <article class="art004">
                    <div>
                        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=1744&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                    <div>
                        <img src="https://plus.unsplash.com/premium_photo-1675788939191-713c2abf3da6?q=80&w=1742&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1549931319-a545dcf3bc73?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1534620808146-d33bb39128b2?q=80&w=774&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                    <div>
                        <img src="https://plus.unsplash.com/premium_photo-1672639601872-eeceb0c5c522?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1627308595260-6fad84c40413?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1598373182308-3270495d2f58?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?q=80&w=1452&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" title="" />
                    </div>
                </article>

                <!-- FICHAS de beneficios de los ingredientes -->
                <article class="art003">
                    <h3>(h3) Beneficios de los ingredientes</h3>

                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi quo nulla reiciendis dolore, ipsam porro quisquam minima quae illum, suscipit officia, illo doloremque temporibus quos neque dolor unde! Quae consectetur vitae excepturi omnis qui, rem quos esse eum suscipit. Molestias quod quia dolore consequatur! Quos ut vel molestias sequi officiis.</p>

                    <div>
                        <div class="ficha">
                            <img src="<?php echo vite_public_url('resources/fast-food-outline.svg'); ?>" alt="" title="" />
                            <h4>(h4) Beneficio 01</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fugit repudiandae explicabo accusantium tempore enim, ullam.</p>
                        </div>
                        <div class="ficha">
                            <img src="<?php echo vite_public_url('resources/fast-food-outline.svg'); ?>" alt="" title="" />
                            <h4>(h4) Beneficio 02</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fugit repudiandae explicabo accusantium tempore enim, ullam.</p>
                        </div>
                        <div class="ficha">
                            <img src="<?php echo vite_public_url('resources/fast-food-outline.svg'); ?>" alt="" title="" />
                            <h4>(h4) Beneficio 03</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fugit repudiandae explicabo accusantium tempore enim, ullam.</p>
                        </div>
                        <div class="ficha">
                            <img src="<?php echo vite_public_url('resources/fast-food-outline.svg'); ?>" alt="" title="" />
                            <h4>(h4) Beneficio 04</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fugit repudiandae explicabo accusantium tempore enim, ullam.</p>
                        </div>
                        <div class="ficha">
                            <img src="<?php echo vite_public_url('resources/fast-food-outline.svg'); ?>" alt="" title="" />
                            <h4>(h4) Beneficio 05</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fugit repudiandae explicabo accusantium tempore enim, ullam.</p>
                        </div>
                        <div class="ficha">
                            <img src="<?php echo vite_public_url('resources/fast-food-outline.svg'); ?>" alt="" title="" />
                            <h4>(h4) Beneficio 06</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fugit repudiandae explicabo accusantium tempore enim, ullam.</p>
                        </div>
                    </div>
                </article>

                <article class="art006">
                    <img srcset="https://dummyimage.com/500x500 500w,
                                 https://dummyimage.com/1800x1100 1800w,
                                 https://dummyimage.com/2560x1200 2560w"
                    
                    sizes="(width <= 800px) 600px,
                           (width <= 1500px) 1200px,
                           2560px"                    
                    
                    src="https://dummyimage.com/500x500" alt="" title="" />
                    <div>
                        <h3>(h3) Panadería</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias illum, ipsum recusandae quaerat eveniet vitae molestiae eos laboriosam voluptatibus eligendi.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam aspernatur doloribus qui cumque assumenda ipsum excepturi vero molestias exercitationem distinctio, deserunt fugiat voluptate nesciunt sit beatae pariatur veritatis odio corporis!</p>
                        <a href="#" class="btn">CTA</a>
                    </div>
                </article>

                 <article class="art006 reverse">
                    <img srcset="https://dummyimage.com/500x500 500w,
                                 https://dummyimage.com/1800x1100 1800w,
                                 https://dummyimage.com/2560x1200 2560w"
                    
                    sizes="(width <= 800px) 600px,
                           (width <= 1500px) 1200px,
                           2560px"                    
                    
                    src="https://dummyimage.com/500x500" alt="" title="" />
                    <div>
                        <h3>(h3) Pastelería</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias illum, ipsum recusandae quaerat eveniet vitae molestiae eos laboriosam voluptatibus eligendi.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam aspernatur doloribus qui cumque assumenda ipsum excepturi vero molestias exercitationem distinctio, deserunt fugiat voluptate nesciunt sit beatae pariatur veritatis odio corporis!</p>
                        <a href="#" class="btn">CTA</a>
                    </div>
                </article>

                 <article class="art006">
                    <img srcset="https://dummyimage.com/500x500 500w,
                                 https://dummyimage.com/1800x1100 1800w,
                                 https://dummyimage.com/2560x1200 2560w"
                    
                    sizes="(width <= 800px) 600px,
                           (width <= 1500px) 1200px,
                           2560px"                    
                    
                    src="https://dummyimage.com/500x500" alt="" title="" />
                    <div>
                        <h3>(h3) Torrijas</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias illum, ipsum recusandae quaerat eveniet vitae molestiae eos laboriosam voluptatibus eligendi.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam aspernatur doloribus qui cumque assumenda ipsum excepturi vero molestias exercitationem distinctio, deserunt fugiat voluptate nesciunt sit beatae pariatur veritatis odio corporis!</p>
                        <a href="#" class="btn">CTA</a>
                    </div>
                </article>
            </section>

            <!-- Contacto -->
            <!-- Formulario con envío por PHP -->
            <section id="artform01">
                <h2>(h2) Contacto envío PHPMailer</h2>

                <article class="artform01">
                    <?php
                    // Comprobar si hay variables en la URL
                    // Si hay un variables de error en la URL, mostrar mensaje de error encima del input del tipo de error
                    if (isset($_GET['error'])) {
                        $error = htmlspecialchars($_GET['error']);
                        $campo = isset($_GET['campo']) ? htmlspecialchars($_GET['campo']) : '';  
                    }

                    $nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';
                    $telefono = isset($_GET['telefono']) ? htmlspecialchars($_GET['telefono']) : '';
                    $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';  
                    $mensaje = isset($_GET['mensaje']) ? nl2br(htmlspecialchars($_GET['mensaje'])) : ''; 
                    ?>

                    <h3>(h3) Solicitar información</h3>
                    <div>
                        <div class="contenedor-form">
                            <form action="/App/artform01.php" method="post" id="idForm">
                                <?php
                                if (isset($error)) { ?>
                                    <p class="error">Error en el campo: <?=$campo?> de tipo: <?=$error?></p>
                                <?php }
                                ?>

                                <!-- nombre -->
                                <label for="nombre">Nombre *</label>
                                <input type="text" name="nombre" id="nombre" minlength="3" maxlength="30" placeholder="Introduce nombre y apellido" value="<?=$nombre?>" required />
                                
                                <!-- teléfono -->
                                <label for="telefono">Teléfono *</label>
                                <input type="tel" name="telefono" id="telefono" placeholder="Introduce nº móvil" value="<?=$telefono?>" required />
                                
                                <!-- email -->
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" id="email" placeholder="Introduce email" value="<?=$email?>" />
                                
                                <!-- mensaje -->
                                <label for="mensaje">Mensaje *</label>
                                <textarea name="mensaje" id="mensaje" rows="7" placeholder="Introduce comentario" required><?=$mensaje?></textarea>
                                
                                <!-- aceptar términos -->
                                <div class="horizontal">
                                    <label for="aceptar">Aceptar términos y condiciones de privacidad *</label>
                                    <input type="checkbox" name="aceptar" id="aceptar" />
                                </div>
                                
                                <!-- captcha -->
                                <label for="captcha">Resuelve</label>
                                <div class="horizontal">
                                    <span id="num1">3</span>
                                    <span id="operacion">+</span>
                                    <span id="num2">8</span>
                                    <input type="text" name="respuesta" placeholder="Respuesta" id="respuesta" required />
                                    <!-- Respuesta calculada OCULTA -->
                                    <input type="hidden" name="respSystem" id="respSystem" value="" />
                                </div>
                                
                                <!-- enviar -->
                                <input type="submit" value="Enviar" class="btn-enviar" />
                            </form>
                        </div>

                        <div class="contenedor-info">
                            <ul>
                                <li>
                                    <a href="tel:+34943001002">
                                        <img src="<?php echo vite_public_url('resources/telefono.svg'); ?>" alt="" title="" />
                                        <span>+34 943 001 002</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@panaderia.com" target="_blank">
                                        <img src="<?php echo vite_public_url('resources/mail.svg'); ?>" alt="" title="" />
                                        <span>info@panaderia.com</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/677001002" target="_blank">
                                        <img src="<?php echo vite_public_url('resources/whatsapp.svg'); ?>" alt="" title="" />
                                        <span>677001001</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://maps.app.goo.gl/WDpiQwbN6gNkuW1NA" target="_blank" >
                                        <img src="<?php echo vite_public_url('resources/map.svg'); ?>" alt="" title="" class="icono-mapa" />
                                        <span><strong>Área Escuela de Diseño y Nuevas Tecnologías</strong><br>C/ Juan Fermín, Juan F. Gilisagasti Kalea, 4, 1º<br>20018 Donostia / San Sebastián<br>Gipuzkoa</span>
                                    </a>
                                </li>
                            </ul>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46473.427156890815!2d-1.9325749123229952!3d43.280981418388954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51b013f0513629%3A0x57e4ff3311f619d9!2s%C3%81rea%20Escuela%20de%20Dise%C3%B1o%20y%20Nuevas%20Tecnolog%C3%ADas!5e0!3m2!1ses!2ses!4v1768585015247!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </article>
            </section>
            
            <!-- Formulario con envío por XMLHTTPRequest (Ajax) -->
            <section id="artform02">
                <h2>(h2) Contacto envio XMLHTTPRequest</h2>

                <article class="artform02">

                    <h3>(h3) Solicitar información</h3>
                    <div>
                        <div class="contenedor-form">

                            <div id="modalEnvioOk" class="modal-envio-ok">
                                <div class="modal-content">
                                    <h3>¡Formulario enviado correctamente!</h3>
                                    <p id="mensajeOk"></p>
                                    <a href="#artform02" class="boton" id="btnMostrarFormulario">Volver</a>
                                </div>
                            </div>

                            <form id="idFormAjax">
                                <p class="error" id="errorAjax"></p>

                                <!-- nombre -->
                                <label for="nombreAjax">Nombre *</label>
                                <input type="text" name="nombre" id="nombreAjax" minlength="3" maxlength="30" placeholder="Introduce nombre y apellido" />
                                
                                <!-- teléfono -->
                                <label for="telefonoAjax">Teléfono *</label>
                                <input type="tel" name="telefono" id="telefonoAjax" placeholder="Introduce nº móvil" />
                                
                                <!-- email -->
                                <label for="emailAjax">Correo electrónico</label>
                                <input type="email" name="email" id="emailAjax" placeholder="Introduce email" />
                                
                                <!-- mensaje -->
                                <label for="mensajeAjax">Mensaje *</label>
                                <textarea name="mensaje" id="mensajeAjax" rows="7" placeholder="Introduce comentario"></textarea>
                                
                                <!-- aceptar términos -->
                                 <div class="horizontal">
                                    <label for="aceptarAjax">Aceptar términos y condiciones de privacidad *</label>
                                    <input type="checkbox" name="aceptar" id="aceptarAjax" />
                                </div>
                                
                                <!-- captcha -->
                                <label for="captchaAjax">Resuelve</label>
                                <div class="horizontal">
                                    <span id="num1Ajax">3</span>
                                    <span id="operacionAjax">+</span>
                                    <span id="num2Ajax">8</span>
                                    <input type="text" name="respuesta" placeholder="Respuesta" id="respuestaAjax" />
                                    <!-- Respuesta calculada OCULTA -->
                                    <input type="hidden" name="respSystem" id="respSystemAjax" value="" />
                                </div>
                                
                                <!-- enviar -->
                                <input type="submit" value="Enviar" class="btn-enviar" id="btnEnviarAjax" />
                            </form>

                            <!-- Loader -->
                            <div class="moduleloader01" id="moduleloader01">
                                <svg version="1.1" id="L2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                    <circle fill="none" stroke="#000000" stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="48"/>
                                    <line fill="none" stroke-linecap="round" stroke="#000000" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="85" y2="50.5">
                                    <animateTransform 
                                        attributeName="transform" 
                                        dur="2s"
                                        type="rotate"
                                        from="0 50 50"
                                        to="360 50 50"
                                        repeatCount="indefinite" />
                                    </line>
                                    <line fill="none" stroke-linecap="round" stroke="#000000" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="49.5" y2="74">
                                    <animateTransform 
                                        attributeName="transform" 
                                        dur="15s"
                                        type="rotate"
                                        from="0 50 50"
                                        to="360 50 50"
                                        repeatCount="indefinite" />
                                    </line>
                                </svg>
                            </div>
                        </div>
                        <div class="contenedor-info">
                            <ul>
                                <li>
                                    <a href="tel:+34943001002">
                                        <img src="<?php echo vite_public_url('resources/telefono.svg'); ?>" alt="" title="" />
                                        <span>+34 943 001 002</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@panaderia.com" target="_blank">
                                        <img src="<?php echo vite_public_url('resources/mail.svg'); ?>" alt="" title="" />
                                        <span>info@panaderia.com</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/677001002" target="_blank">
                                        <img src="<?php echo vite_public_url('resources/whatsapp.svg'); ?>" alt="" title="" />
                                        <span>677001001</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://maps.app.goo.gl/WDpiQwbN6gNkuW1NA" target="_blank" >
                                        <img src="<?php echo vite_public_url('resources/map.svg'); ?>" alt="" title="" class="icono-mapa" />
                                        <span><strong>Área Escuela de Diseño y Nuevas Tecnologías</strong><br>C/ Juan Fermín, Juan F. Gilisagasti Kalea, 4, 1º<br>20018 Donostia / San Sebastián<br>Gipuzkoa</span>
                                    </a>
                                </li>
                            </ul>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46473.427156890815!2d-1.9325749123229952!3d43.280981418388954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51b013f0513629%3A0x57e4ff3311f619d9!2s%C3%81rea%20Escuela%20de%20Dise%C3%B1o%20y%20Nuevas%20Tecnolog%C3%ADas!5e0!3m2!1ses!2ses!4v1768585015247!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </article>
            </section>
        </main>
        <footer>
            <p>&copy; 2025 Maquetación. Todos los derechos reservados.</p>
        </footer>
  </body>
</html>
