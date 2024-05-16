<link rel="stylesheet" type="text/css" href="css/registro.css">
<script src="../js/register.js"></script>
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