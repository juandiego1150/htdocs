<link rel="stylesheet" type="text/css" href="css/registro.css">
<script src="../js/registro.js"></script>

<div class="login-page">
    <div class="form">
        <!-- formulario de registro -->
        <form class="register-form">
            <input type="text" placeholder="name" id="nombreRegistro" />
            <input type="password" placeholder="password" id="contraseñaRegistro" />
            <button id="registrarse">crear cuenta</button>
            <p class="message">Ya estas registrado? <a href="#">Inicia sesion</a></p>
        </form>
        <!-- formulario de login -->
        <form class="login-form">
            <input type="text" placeholder="username" id="nombreLogin" />
            <input type="password" placeholder="password" id="contraseñaLogin" />
            <button id="login">login</button>
            <p class="message">No estas registrado? <a href="#">Crea una cuenta</a></p>
        </form>
        <div id="alerta"></div>
    </div>
</div>
<!-- popup -->
<div id="overlay"></div>
<div id="popup">
    <div id="popupBody">
    </div>
    <button id="cerrar">Aceptar</button>
</div>
<script>
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
                    console.log(a);
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
</script>