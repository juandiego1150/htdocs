<div class="login-page">
    <div class="form-container">
        <!-- formulario de registro -->
        <form id="register-form" class="register-form">
            <input type="text" placeholder="name" id="nombreRegistro" class="form-input" />
            <input type="password" placeholder="password" id="contraseñaRegistro" class="form-input" />
            <button id="registrarse" class="form-button" onclick="event.preventDefault()">crear cuenta</button>
            <p class="message">Ya estas registrado? <a href="#">Inicia sesion</a></p>
        </form>
        <!-- formulario de login -->
        <form id="login-form" class="login-form">
            <input type="text" placeholder="username" id="nombreLogin" class="form-input" />
            <input type="password" placeholder="password" id="contraseñaLogin" class="form-input" />
            <button id="login" class="form-button" onclick="event.preventDefault()">login</button>
            <p class="message">No estas registrado? <a href="#">Crea una cuenta</a></p>
        </form>
        <div id="alerta"></div>
    </div>
</div>
<script src="../js/register.js"></script>
