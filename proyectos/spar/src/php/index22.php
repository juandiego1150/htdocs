<!DOCTYPE html>
<html>
<head>
    <title>Mi página web</title>
    <link rel="stylesheet" type="text/css" href="css/barralateral.css">
    <link rel="stylesheet" type="text/css" href="css/productos.css"> 
    <link rel="stylesheet" type="text/css" href="css/style.css">

   <style>
 
   </style>
</head>
<body>
    <header>
        <div id="barraUtilidades">
                <div class="titulobarra">APLICACION WEB GESTIÓN OFERTAS SPAR</div>
                <div class="usuariobarra"> <div id="imagenUsuario"><img  src="../img/usuario.png"></div><p id="usuario"></p></div>
            </div>
        </div>
    </header>
    <main>
    <div class="area"></div><nav class="main-menu">
            <ul> <li id="spar">
                    <a>
                        <i class="fa fa-2x">
                            <img  class="fa " src="../img/spar.png" alt="logo spar">
                        </i>
                        <span class="nav-text">
                           SPAR
                        </span>
                    </a>
                  
                </li>
                <li id="clickproductos">
                    <a>
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                           Productos
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-globe fa-2x"></i>
                        <span class="nav-text">
                            Acerca de nosotros
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav" id='tablonMensajes'>
                    <a href="#">
                       <i class="fa fa-comments fa-2x"></i>
                        <span class="nav-text">
                            Contacte con nosotros
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-camera-retro fa-2x"></i>
                        <span class="nav-text">
                            Fotos de la empresa
                        </span>
                    </a>
                   
                </li>
                <li id="adimistrador">
                   <a href="#">
                       <i class="fa fa-cogs fa-2x"></i>
                        <span class="nav-text">
                            Administador
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Donde nos encontramos
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentacion del proyecto
                        </span>
                    </a>
                </li>
            </ul>
            <ul class="register">
                <li id="register">
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Register
                        </span>
                    </a>
                </li>  
            </ul>
            <ul class="logout">
                <li id="cerrarSesion">
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
    </main>
    <div id="contenido">
        <h1>Bienvenido a la página web de SPAR</h1>
        <p>En esta página web podrás encontrar información sobre los productos que vendemos en nuestra tienda.</p>
    </div>
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
                    $("#popupBody").html(a);
                    openPopup('register');
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
                        $("#register").hide();
                        $("#cerrarSesion").show();
                        $("#usuario").show();
                    } else{
                        $("#usuario").hide();
                        $("#register").show();
                        $("#cerrarSesion").hide();
                        $("#adimistrador").remove();
                        $("#tablonMensajes").remove();
                        $("#clickproductos").remove();
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