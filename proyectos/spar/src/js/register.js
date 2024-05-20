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
                if (a === "1") {
                $("#popupBody").html("Usuario registrado e iniciado correctamente");
                openPopup('spar');
                }else{
                    $("#alerta").html(a);
                }
            }
        });
    });
    //login script
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
                            $("#popupBody").html(a);
                            openPopup('spar');
                            break;
                    }
            }  
        });
    });
    //registro script

    $('.message a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "slow");
    });
    //fin registro script
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