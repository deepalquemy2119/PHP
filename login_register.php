<?php
include 'validate_session.php';


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/login_register.css">
    <title>Login o Registro</title>
</head>
<body>

    <div class="container text-center mt-5" id="main-container">
    <h1 class="title-h1">My C2B <br> <br> <br></h1>
        <!-- <h4>¿Qué deseas hacer?</h4> -->
        <button class="btn btn-primary m-2" onclick="showOptions('register')">Registrar</button>
        <button class="btn btn-success m-2" onclick="showOptions('login')">Iniciar Sesión</button>
    </div>

    <div id="options-container" class="mt-4" style="display:none;">
        <h4>&nbsp;&nbsp;&nbsp;Eres...?</h4>
        <button class="btn btn-primary m-2" onclick="showForm('empresa', currentAction)">Empresa</button>
        <button class="btn btn-success m-2" onclick="showForm('usuario', currentAction)">Usuario</button>
    </div>
    <br><br><br><br>

    <!-- ---------------- Título dinámico --------------- -->
    <div id="form-container" class="form-container mt-4" style="display:none;">
        <h4 id="form-title" class="m-5"></h4> 
        <br>
    <!-- ---------- Formulario Empresa para Registro ----------- -->
        <div id="empresa-register-form" class="form-section" style="display:none;">
            <form action="registroCompany.php" method="post" class="container">
                <div class="mb-3">
                    <label for="empresa" class="form-label">Nombre de la Empresa</label>
                    <input type="text" class="form-control" id="empresa" name="empresa" required>
                </div>
                <div class="mb-3">
                    <label for="email_empresa" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_empresa" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password_empresa" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_empresa" name="password" required>
                </div>
                <a href="home.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Enviar">
            </form>
        </div>
        
        <!-- ------------ Formulario Usuario para Registro -------------- -->
        <div id="usuario-register-form" class="form-section" style="display:none;">
            <form action="registroUser.php" method="post" class="container">
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email_usuario" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_usuario" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password_usuario" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_usuario" name="password" required>
                </div>
                <a href="home.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Enviar">
            </form>
        </div>
        
        <!-- ------------ Formulario Empresa para Login --------------- -->
        <div id="empresa-login-form" class="form-section" style="display:none;">
            <form action="loginCompany.php" method="post" class="container">
                <div class="mb-3">
                    <label for="email_empresa_login" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_empresa_login" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password_empresa_login" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_empresa_login" name="password" required>
                </div>
                <a href="home.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Iniciar Sesión">
            </form>
        </div>
        <br><br><br><br>
        <!-- ------------ Formulario Usuario para Login ------------- -->
        <div id="usuario-login-form" class="form-section" style="display:none;">
            <form action="loginUser.php" method="post" class="container">
                <div class="mb-3">
                    <label for="email_usuario_login" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_usuario_login" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password_usuario_login" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password_usuario_login" name="password" required>
                </div>
                <a href="home.php" class="btn btn-primary m-3">Back</a>
                <input type="submit" class="btn btn-success m-3" value="Iniciar Sesión">
            </form><br>
        </div>
    </div>
<br><br><br><br>
    <footer class="footer text-center">
        <p class="text-footer">&copy; Gonzalo Rodrigo. DeepAlquemy2024</p>
    </footer>

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
    </script>
</body>
</html>


<!--     Nota:
    La variable currentAction es para mantener el estado de la acción actual (registro o inicio de sesión).

    Función showOptions: Actualiza currentAction según si se selecciona:Registrar o Iniciar Sesión.

    Función showForm: Para que el título cambie según la combinación de acciones:
        Si selecciona Iniciar Sesión y luego Empresa, muestra:
             Iniciar Sesión - Empresa o para usuario
        Si selecciona Registrar y luego Empresa, muestra:
             Registro de Empresa o para usuario.
//-------------------------------------------------------------

/* Para verificar Empresa. Tabla: 
    
    CREATE TABLE `companies` (
    `id_company` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `descripcion` text NOT NULL,
    `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_company`),
    CHECK (CHAR_LENGTH(nombre) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
*/

/* Para verificar que los datos del formulario se han cargado correctamente en la base de datos, necesitarás realizar algunos pasos adicionales después de que el formulario se envíe y procesar los datos. Aquí te muestro cómo hacerlo utilizando tu código y asumiendo que tienes un archivo de procesamiento, como registroCompany.php o registroUser.php.
Paso 1: Procesar el formulario

Vamos a suponer que estás trabajando con registroCompany.php para registrar a una empresa. El código puede verse así:

php

<?php
// // registroCompany.php
// session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $empresa = $_POST['empresa'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Aquí debes conectarte a la base de datos
//     $servername = "localhost";
//     $username = "tu_usuario";
//     $password_db = "tu_contraseña";
//     $dbname = "tu_base_de_datos";

//     $conn = new mysqli($servername, $username, $password_db, $dbname);

//     // Verificar conexión
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Preparar y ejecutar la consulta
//     $stmt = $conn->prepare("INSERT INTO empresas (nombre, email, password) VALUES (?, ?, ?)");
//     $stmt->bind_param("sss", $empresa, $email, password_hash($password, PASSWORD_DEFAULT)); // Usar hash para contraseñas

//     if ($stmt->execute()) {
//         echo "Registro exitoso. <br>";
//         echo "Nombre de la empresa: $empresa <br>";
//         echo "Correo electrónico: $email <br>";
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     // Cerrar conexión
//     $stmt->close();
//     $conn->close();
// } else {
//     echo "Método no permitido.";
// }
?>

Paso 2: Verificar la inserción

En el bloque if ($stmt->execute()), puedes agregar mensajes para confirmar que los datos se han insertado correctamente. En este caso, se muestra un mensaje de éxito junto con los datos ingresados.
Paso 3: Crear un archivo para verificar

Si deseas verificar los datos directamente desde la base de datos después de que se haya enviado el formulario, puedes crear un archivo llamado verificar.php que consulte la base de datos y muestre los registros:

php

<?php
// // verificar.php
// $servername = "localhost";
// $username = "tu_usuario";
// $password_db = "tu_contraseña";
// $dbname = "tu_base_de_datos";

// $conn = new mysqli($servername, $username, $password_db, $dbname);

// // Verificar conexión
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Consulta para obtener los registros
// $sql = "SELECT nombre, email FROM empresas";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Mostrar los datos
//     while($row = $result->fetch_assoc()) {
//         echo "Nombre: " . $row["nombre"]. " - Email: " . $row["email"]. "<br>";
//     }
// } else {
//     echo "0 resultados";
// }

// $conn->close();
?>

Paso 4: Acceder a la verificación

Después de que los datos se hayan enviado y procesado, puedes navegar a verificar.php en tu navegador para ver si los datos se han guardado correctamente en la base de datos.
Notas importantes

    Validación y seguridad: Siempre valida y sanitiza los datos del formulario para protegerte contra inyecciones SQL y otros problemas de seguridad.
    Contraseñas: Usa password_hash() para almacenar contraseñas de forma segura y password_verify() para compararlas en el inicio de sesión.
    Manejo de errores: Implementa un manejo adecuado de errores para que puedas identificar problemas en la conexión o ejecución de la consulta.*/
