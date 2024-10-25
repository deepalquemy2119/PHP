<?php
// var de entorno
include_once 'load_env.php';
include_once 'connectDDBB.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ---------------------- GOOGLE API ------------------------- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- ---------------------- BOOTSTRAP ------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ---------------------- LOCAL CSS ------------------------- -->
    <link rel="stylesheet" href="./public/css/login_register.css">
    <title>My C2B</title> 
</head>
<body>

<!-- ---------------------- HEADER ------------------------- -->
<header class="header-content">
    <div class="header-text">
 
        <h1 class="title-h1">My C2B</h1>
     
    </div>
</header>
<div class="container text-center mt-5" id="main-container">
  
        <button class="btn btn-primary m-2" onclick="showOptions('register')">Registrar</button>
        <button class="btn btn-success m-2" onclick="showOptions('login')">Iniciar Sesión</button>
        <br><br><br><br><br>
    </div>

    <div id="options-container" class="mt-3" style="display:none;">
        <h4>&nbsp;&nbsp;&nbsp;Eres...?</h4>
        <button class="btn btn-primary m-2" onclick="showForm('empresa', currentAction)">Empresa</button>
        <button class="btn btn-success m-2" onclick="showForm('usuario', currentAction)">Usuario</button>
    </div>
    <br><br><br><br>

    <!-- ---------------- Título dinámico --------------- -->
    <div id="form-container" class="form-container mt-2" style="display:none;">
        <h4 id="form-title" class="m-5"></h4> 
        <br>
    <!-- ---------- Formulario Empresa para Registro ----------- -->
        <div id="empresa-register-form" class="form-section" style="display:none;">
            <form action="registroCompany.php" method="post" class="container">
                <div class="mb-3">
                    <label for="empresa" class="form-label">Nombre de la Empresa</label>
                    <input type="text" class="form-control" id="empresa" name="empresa" value=""  autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="email_empresa" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_empresa" name="email" value="" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion_empresa" class="form-label">Descripcion Empresa</label>
                    <input type="text" class="form-control" id="descripcion_empresa" name="descripcion_empresa" value="" autocomplete="off" required>
                </div>
                
                <div class="mb-3">
                    <label for="busca_empresa" class="form-label">Descripcion Servicio Busca</label>
                    <input type="text" class="form-control" id="busca_empresa" name="busca_empresa" value="" autocomplete="off" required>
                </div>
                
                <div class="mb-3">
                    <label for="password_empresa" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_empresa" name="password" value="" autocomplete="off" required>
                </div>
                <a href="login_register.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Enviar">
            </form>
        </div>
        
        <!-- ------------ Formulario Usuario para Registro -------------- -->
        <div id="usuario-register-form" class="form-section" style="display:none;">
            <form action="registroUser.php" method="post" class="container">
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre" value="" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="email_usuario" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_usuario" name="email" value="" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="password_usuario" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_usuario" name="password" value="" autocomplete="off" required>
                </div>
                <a href="login_register.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Enviar">
            </form>
        </div>
        
        <!-- ------------ Formulario Empresa para Login --------------- -->
        <div id="empresa-login-form" class="form-section" style="display:none;">
            <form action="loginCompany.php" method="post" class="container">
                <div class="mb-3">
                    <label for="email_empresa_login" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_empresa_login" name="email" value="" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="password_empresa_login" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_empresa_login" name="password" value="" autocomplete="off" required>
                </div>
                <a href="login_register.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Iniciar Sesión">
            </form>
        </div>
        <br><br><br><br>
        <!-- ------------ Formulario Usuario para Login ------------- -->
        <div id="usuario-login-form" class="form-section" style="display:none;">
            <form action="loginUser.php" method="post" class="container">
                <div class="mb-3">
                    <label for="email_usuario_login" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_usuario_login" name="email" value="" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="password_usuario_login" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_usuario_login" name="password" value="" autocomplete="off" required>
                </div>
                <a href="login_register.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Iniciar Sesión">
            </form><br>
        </div>
    </div>
<br><br><br><br>
  
<script>
    // -------------------- Estado inicial ------------------
    let currentAction = 'register'; 

    function showOptions(action) {
        //  ------------ Actualizar acción actual -------------
        currentAction = action;

        const mainContainer = document.getElementById('main-container');
        const optionsContainer = document.getElementById('options-container');
        mainContainer.style.display = 'none'; 
        optionsContainer.style.display = 'block'; 
        document.getElementById('form-container').style.display = 'none'; 
    }

    // --------- Funcion Mostrar Formulario ------------
    function showForm(type, action) {
        const optionsContainer = document.getElementById('options-container');
        const formContainer = document.getElementById('form-container');
        const empresaRegisterForm = document.getElementById('empresa-register-form');
        const usuarioRegisterForm = document.getElementById('usuario-register-form');
        const empresaLoginForm = document.getElementById('empresa-login-form');
        const usuarioLoginForm = document.getElementById('usuario-login-form');
        const formTitle = document.getElementById('form-title');

        optionsContainer.style.display = 'none'; 
        formContainer.style.display = 'block'; 

        //funcion limpia todos los formularios
        resetForms();

        if (action === 'login') {
            if (type === 'empresa') {
                empresaLoginForm.style.display = 'block';
                usuarioLoginForm.style.display = 'none';
                formTitle.textContent = 'Iniciar Sesión - Empresa';
            } else {
                empresaLoginForm.style.display = 'none';
                usuarioLoginForm.style.display = 'block';
                formTitle.textContent = 'Iniciar Sesión - Usuario';
            }
        } else { 
            // Si es registro
            if (type === 'empresa') {
                empresaRegisterForm.style.display = 'block';
                usuarioRegisterForm.style.display = 'none';
                formTitle.textContent = 'Registro de Empresa';
            } else {
                empresaRegisterForm.style.display = 'none';
                usuarioRegisterForm.style.display = 'block';
                formTitle.textContent = 'Registro de Usuario';
            }
        }
    }

    //para limpiar todos los formularios
    function resetForms() {
        const empresaRegisterForm = document.getElementById('empresa-register-form');
        const usuarioRegisterForm = document.getElementById('usuario-register-form');
        const empresaLoginForm = document.getElementById('empresa-login-form');
        const usuarioLoginForm = document.getElementById('usuario-login-form');

        // Limpio campos del formulario de registro de empresa
        if (empresaRegisterForm.style.display === 'block') {
        empresaRegisterForm.querySelectorAll('input').forEach(input => input.value = '');
    }

        // Limpio campos del formulario de registro de usuario
        if (usuarioRegisterForm.style.display === 'block') {
        usuarioRegisterForm.querySelectorAll('input').forEach(input => input.value = '');
    }

        // Limpio campos del formulario de login de empresa
        if (empresaLoginForm.style.display === 'block') {
        empresaLoginForm.querySelectorAll('input').forEach(input => input.value = '');
    }

        // Limpio campos del formulario de login de usuario
        if (usuarioLoginForm.style.display === 'block') {
        usuarioLoginForm.querySelectorAll('input').forEach(input => input.value = '');
    }
    }
</script>

<!--     Nota:
    La variable currentAction es para mantener el estado de la acción actual (registro o inicio de sesión).

    Función showOptions: Actualiza currentAction según si se selecciona:Registrar o Iniciar Sesión.

    Función showForm: Para que el título que cambie según la combinación de acciones:
        Si selecciona Iniciar Sesión y luego Empresa, muestra:
             Iniciar Sesión - Empresa o para usuario
        Si selecciona Registrar y luego Empresa, muestra:
             Registro de Empresa o para usuario.  -->


<!-- ---------------------- FOOTER ------------------------- -->
<footer class="footer text-center">
    <p class="text-footer">&copy; Gonzalo Rodrigo. DeepAlquemy2024</p>
    <a href="https://www.gmail.com/" target="_blank"><img class="img-icon" src="./public/images/icons/gmail-foto.png" alt="gmail"></a>
    <a href="https://www.youtube.com/" target="_blank"><img class="img-icon" src="./public/images/icons/youtube-foto.png" alt="youtube"></a>
    <a href="https://www.whatsapp.com/" target="_blank"><img class="img-icon" src="./public/images/icons/whatsapp-foto.png" alt="whatsapp"></a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
