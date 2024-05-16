<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/productos.css"> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/index.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spar Supermercados</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: #cc0000; /* Rojo SPAR */
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: row;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .menu-icon {
            display: none;
            cursor: pointer;
        }

        .menu-icon div {
            width: 25px;
            height: 3px;
            background-color: #fff;
            margin: 5px;
        }

        /* Banner */
        .banner {
            background-color: #008000; /* Verde SPAR */
            color: #fff;
            text-align: center;
            padding: 100px 20px;
        }

        .banner h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .banner p {
            font-size: 18px;
        }

        /* Sobre nosotros */
        .sobre-nosotros {
            background-color: #ffffff; /* Blanco */
            padding: 50px 20px;
            text-align: center;
        }

        .sobre-nosotros h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .sobre-nosotros p {
            font-size: 16px;
            line-height: 1.8;
        }
          nav ul li a:hover {
            color: #008000; /* Verde SPAR */
        }

        /* Footer */
        footer {
            background-color: #cc0000; /* Rojo SPAR */
            color: #fff;
            text-align: center;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .logo {
                font-size: 24px;
            }

            nav ul {
                display: none;
                flex-direction: column;
                width: 100%;
                position: absolute;
                top: 60px;
                left: 0;
                background-color: #cc0000; /* Rojo SPAR */
            }

            nav ul.active {
                display: flex;
            }

            nav ul li {
                margin: 0;
                text-align: center;
                padding: 10px 0;
            }

            .menu-icon {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .logo {
                font-size: 20px;
            }

            .banner h1 {
                font-size: 24px;
            }

            .banner p {
                font-size: 16px;
            }
        }
    </style>
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
