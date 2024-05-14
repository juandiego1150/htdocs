
    $(document).ready(function() {
        $("#registrarse").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 2,
                    nombre: $("#nombreRegistro").val(),
                    contraseña: $("#contraseñaRegistro").val()
                },
                success: function(a) {
                    $("#popupBody").html(a);
                    openPopup();
                }
            });
        });

        $("#login").click(function() {
            $.ajax({
                type: "POST",
                url: "controllers/usuarios.php",
                dataType: "Text",
                data: {
                    option: 4,
                    nombre: $("#nombreLogin").val(),
                    contraseña: $("#contraseñaLogin").val()
                },
                success: function(a) {
                        switch (a) {
                            case "1":
                                a = "faltan datos";
                                $("#alerta").html(a);
                                break;
                            case "3":
                                a = "usuario o contraseña incorrectos";
                                $("#alerta").html(a);
                                break;
                            case "2":
                                a = "Bienvenido";
                                openPopup();
                                $("#popupBody").html(a);
                                break;
                        }
                }  
            });
        });
          //POPUP SCRIPT
          $("#cerrar").click(function() {
                closePopup();
            });
        function openPopup() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
        }

        // Función para cerrar el pop-up
        function closePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }
        //FIN POPUP SCRIPT
        //registro script

        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
        //fin registro script
    });
