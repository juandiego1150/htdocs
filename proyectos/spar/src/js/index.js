        //script para el menu mobile
        function toggleMenu() {
            const navUL = document.querySelector('nav ul');
            navUL.classList.toggle('active');
        }
        //fin script menu mobile
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
                    openPopup('register',true);
                }
            });
        });
        //click en ofertas
        $("#ofertas").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/productos.php",
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
            

                  //POPUP SCRIPT
      document.getElementById('cerrar').addEventListener('click', function() {
        var reload = $("#cerrar").attr("reload");
        var id2 = $("#cerrar").attr("id2");
        
        if (reload === "true") {
            location.reload();
        } else {
            closePopup(id2);
        }
    });
    
        function openPopup(idclick,reload) {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
            $("#cerrar").attr("id2", idclick);
            $("#cerrar").attr("reload", reload);

        }

        // Función para cerrar el pop-up
        function closePopup(idclick) {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
            $("#"+idclick).trigger("click");

        }
        //FIN POPUP SCRIPT


    });