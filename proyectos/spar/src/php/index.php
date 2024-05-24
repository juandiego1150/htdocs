<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/registro.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/productos.css"> 
<link rel="stylesheet" type="text/css" href="css/ofertas.css"> 
<link rel="stylesheet" type="text/css" href="css/mensajes.css">
<link rel="stylesheet" type="text/css" href="css/administrador.css">



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/index.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spar Supermercados</title>
</head>
<body>
    <header>
        <div class="logo" id="spar">SPAR Supermercados</div>
        <div class="menu-icon" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <nav>
            <ul>
                <li id="clickproductos"><a href="#">Productos</a></li>
                <li id="ofertas"><a href="#">Ofertas</a></li>
                <li id="tablonMensajes"><a href="#">Contacto</a></li>
                <li id="register"><a href="#">Inicia sesión</a></li>
                <li id="adimistrador"><a href="#">Administrador</a></li>
                <div class="usuariobarra"> <li id="cerrarSesion"><a href="#">Cerrar sesión</a></li>
                <div id="imagenUsuario"><img  src="../img/usuario.png"></div><p id="usuario"></p></div>

            </ul>
        </nav>
    </header>
<div id="contenido">
    <!-- video de fondo -->
    <div id="degradadoVideo"> </div>

    <video autoplay muted loop id="myVideo">
        <source src="../img/stock-footage-close-up-of-a-grocery-cart-driving-through-the-supermarket-women-s-feet-walk-through-the.webm" type="video/mp4">
    </video>
    <div class="banner">
        <h1>Bienvenido a SPAR Supermercados</h1>
        <p>Descubre una amplia selección de productos frescos y de calidad al mejor precio. ¡Visítanos hoy!</p>
    </div>

    <div class="sobre-nosotros">
        <h2>Sobre Nosotros</h2>
        <p>Spar es una cadena de supermercados que opera a nivel internacional, ofreciendo una amplia variedad de productos alimenticios y de consumo. Con más de 85 años de experiencia, Spar se ha consolidado como una marca de confianza, comprometida con la calidad y la satisfacción del cliente. Nuestros supermercados están diseñados para brindar una experiencia de compra cómoda y agradable, con un equipo de profesionales dedicados a ofrecer el mejor servicio.</p>
    </div>
    <section class="testimony">
        <div class="testimony__container container">
            <img src="../img/leftarrow.svg" class="testimony__arrow" id="before">
            <section class="testimony__body testimony__body--show" data-id="1">
                <div class="testimony__texts">
                    <h2 class="subtitle">Descubre las <span class="testimony__course">MEJORES OFERTAS</span> en Spar.</h2>
                    <p class="testimony__review">Aprovecha nuestras promociones y descuentos en una amplia variedad de productos para
                        obtener el mejor precio en tus compras diarias.</p>
                </div>
                <figure class="testimony__picture">
                    <img src="../img/oferta.jpg" class="testimony__img">
                </figure>
            </section>

            <section class="testimony__body" data-id="2">
                <div class="testimony__texts">
                    <h2 class="subtitle">Encuéntranos en <span class="testimony__course">Valverde de Leganés</span>.</h2>
                    <p class="testimony__review">Visítanos en nuestros establecimientos en Valverde de Leganés para disfrutar de la mejor atención
                        al cliente y una amplia selección de productos frescos y de calidad.</p>
                </div>
                <figure class="testimony__picture">
                    <img src="../img/valverde.jpg" class="testimony__img">
                </figure>
            </section>

            <section class="testimony__body" data-id="3">
                <div class="testimony__texts">
                    <h2 class="subtitle">Consulta nuestros <span class="testimony__course">HORARIOS DE APERTURA</span>.</h2>
                    <p class="testimony__review">Te invitamos a conocer nuestros horarios de apertura para planificar tus visitas
                        y aprovechar al máximo tu tiempo de compras en Spar.</p>
                </div>
                <figure class="testimony__picture">
                    <img src="../img/apertura.jpg" class="testimony__img">
                </figure>
            </section>

            <section class="testimony__body" data-id="4">
                <div class="testimony__texts">
                    <h2 class="subtitle">Explora la <span class="testimony__course">HISTORIA</span> de nuestra empresa.</h2>
                    <p class="testimony__review">Conoce nuestra trayectoria y cómo hemos crecido para convertirnos en tu supermercado
                        de confianza. Descubre nuestra historia y valores que nos han guiado desde nuestros inicios.</p>
                </div>
                <figure class="testimony__picture">
                    <img src="../img/historia.jpg" class="testimony__img">
                </figure>
            </section>

            <img src="../img/rightarrow.svg" class="testimony__arrow" id="next">
        </div>
    </section>
     <!-- Sección de Ofertas -->
     <section id="ofertaIndex" class="more-info">
        <h2>¡Descubre nuestras irresistibles ofertas!</h2>
        <div class="offer-container">
            <div class="offer">
                <img src="../img/descuentos-exclusivos.png" alt="Oferta 1">
                <h3>Descuentos exclusivos</h3>
                <p>No te pierdas nuestros descuentos en una amplia selección de productos. ¡Ahorra mientras disfrutas de la mejor calidad!</p>
            </div>
            <div class="offer">
                <img src="../img/ofertasemanal.png" alt="Oferta 2">
                <h3>Promociones semanales</h3>
                <p>Cada semana te sorprendemos con nuevas promociones en productos frescos y de temporada. ¡No dejes pasar la oportunidad!</p>
            </div>
            <div class="offer">
                <img src="../img/sorteo.jpg" alt="Oferta 3">
                <h3>Regalos y obsequios</h3>
                <p>Participa en nuestras promociones y llévate fantásticos regalos con tus compras. ¡Haz tus compras aún más emocionantes!</p>
            </div>
        </div>
    </section>

     <!-- Sección de Historia -->
     <section id="historia" class="more-info">
    <!-- div para superponer la transparencia -->
    <div class="overlay_historia"></div>
    

    <div class="history">
    <h2>¡Descubre nuestra fascinante historia!</h2>

        <p>Desde nuestros modestos comienzos como una pequeña tienda de barrio hasta convertirnos en una cadena de supermercados reconocida a nivel nacional, nuestra historia está llena de momentos emocionantes y desafiantes. Acompáñanos en este viaje y descubre cómo hemos crecido junto a nuestros clientes a lo largo de los años.</p>
    </div>
</section>


    <!-- Sección de Contacto -->
    <section id="contacto" class="more-info">
        <h2>¡Contáctanos!</h2>
        <div class="contact-info">
            <p>¿Necesitas ayuda? ¡Estamos aquí para ti! Contáctanos por teléfono, correo electrónico o visítanos en nuestra tienda más cercana. ¡Estamos deseando escucharte!</p>
            <ul>
                <li><strong>Teléfono:</strong> 123-456-789</li>
                <li><strong>Correo electrónico:</strong> info@spar.com</li>
                <li><strong>Dirección:</strong> Calle Principal, 123, Ciudad</li>
            </ul>
        </div>
    </section>

   

</div>
<!-- popup -->
<div id="overlay"></div>
<div id="popup">
    <div id="popupBody">
    </div>
    <button id="cerrar">Aceptar</button>
</div>
<!-- fin popup -->
    <footer>
        &copy; 2024 SPAR Supermercados - Todos los derechos reservados.
    </footer>
    

</body>
    <script src="../js/slider.js"></script>

</html>
