<!DOCTYPE html>
<html>
<head>
    <title>Mi página web</title>
    <link rel="stylesheet" type="text/css" href="css/barralateral.css">
    <link rel="stylesheet" type="text/css" href="css/productos.css"> 

   <style>
    #productos {
        display: none;
    }
   </style>
</head>
<body>
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
                <li class="has-subnav">
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
                <li>
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
            <ul class="register" id="register">
                <li>
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Register
                        </span>
                    </a>
                </li>  
            </ul>
            <ul class="logout">
                <li>
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
        // JavaScript code goes here
        $(document).ready(function() {
            
            $("#spar").click(function() {
                window.location.href = "index.php";
            });

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
            $("#register").click(function() {
                $.ajax({
                    type: "POST",
                    url: "controllers/usuarios.php",
                    dataType: "Text",
                    data: {
                        option: 2
                    },
                    success: function(a) {
                        $("#contenido").html(a);
                        animateContent();
                    }
                });
            });
            function animateContent() {
                $("#contenido").fadeIn(1000);
                
            }
        });
    });
    </script>
</body>
</html>