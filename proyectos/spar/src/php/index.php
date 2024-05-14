<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/productos.css"> 
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
                <li id="register"><a href="#">Registrarse/Iniciar sesión</a></li>
                <li id="adimistrador"><a href="#">Administrador</a></li>
                <li id="cerrarSesion"><a href="#">Cerrar sesión</a></li>
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
</div>
    <footer>
        &copy; 2024 SPAR Supermercados - Todos los derechos reservados.
    </footer>

    <script>
        function toggleMenu() {
            const navUL = document.querySelector('nav ul');
            navUL.classList.toggle('active');
        }
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript 
    $(document).ready(function() {
            //click en el logo de spar
            $("#spar").click(function() {
                location.reload();
            });
            //click en productos
        $("#clickproductos").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/productos.php",
                dataType: "Text",
                data: {
                    option: 1
                },
                success: function(a) {
                    $("#contenido").html(a);
                    animateContent();
                }
            });
        });
        //click en contactanos
        $("#tablonMensajes").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 8
                },
                success: function(a) {
                    $("#contenido").html(a);
                    animateContent();
                }
            });
        });
        //click en register
        $("#register").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 1
                },
                success: function(a) {
                    $("#contenido").html(a);
                    animateContent();
                }
            });
        });
        //click en administrador
        $("#adimistrador").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 3
                },
                success: function(a) {
                    $("#contenido").html(a);
                    animateContent();
                }
            });
        });
        //click en cerrar sesion
        $("#cerrarSesion").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 5
                },
                success: function(a) {
                    alert(a);
                    location.reload();
                    $("#popupBody").html(a);
                    openPopup();
                }
            });
        });
        function animateContent() {
            $("#contenido").fadeIn(1000);
        }
        //comprobamos si hay sesion iniciada para mostrar y ocultar los botones y añadir funcionalidades
        $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 6
                },
                success: function(respuesta) {
                    if (respuesta == 1 || respuesta == "1") {
                        $("#register").remove();
                        $("#cerrarSesion").show();
                        $("#usuario").show();
                    } else{
                        $("#usuario").remove();
                        $("#register").show();
                        $("#cerrarSesion").remove();
                        $("#adimistrador").remove();
                        $("#tablonMensajes").remove();
                        $("#clickproductos").remove();
                        $("#ofertas").remove();
                        $("#imagenUsuario").click(function() {
                            $("#register").trigger("click");
                        }).css("cursor", "pointer");
                        
                    }
                }
            });
            //comprobamos si el usuario es administrador para mostrar el boton de administrador
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 7
                },
                success: function(respuesta) {
                     if(respuesta == 2 || respuesta == "2"){
                        $("#adimistrador").remove();
                    }
                    
                }
            });
            //llamada para traer el nombre del usuario
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 11
                },
                success: function(respuesta) {
                    $("#usuario").html(respuesta);
                }
            });

    });
    </script>
</body>
</html>
