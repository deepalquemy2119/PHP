<?php
//inicio sesion
session_start();

//----------------------------

/* 

Flujo del Proceso de Inicio de Sesión

    Formulario de Inicio de Sesión: El usuario llena un formulario que envía su nombre de usuario y contraseña.

    Archivo de Procesamiento: Este archivo recibe los datos del formulario y verifica las credenciales.

Ejemplo de Implementación

Aquí hay un ejemplo completo que ilustra cómo se podría implementar este proceso:
1. Formulario de Inicio de Sesión (login.php)

html

<form action="process_login.php" method="POST">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Iniciar Sesión</button>
</form>

2. Archivo de Procesamiento de Inicio de Sesión (process_login.php)

php

<?php
session_start();
include_once 'load_env.php'; // Cargar las variables de entorno

$servername = getenv('DB_SERVER');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$username_input = $_POST['username'];
$password_input = $_POST['password'];

// Preparar y ejecutar la consulta para verificar credenciales
$stmt = $conn->prepare("SELECT user_id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username_input);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($usuario_id, $hashed_password);
    $stmt->fetch();

    // Verificar la contraseña
    if (password_verify($password_input, $hashed_password)) {
        // Credenciales correctas
        $_SESSION['user_id'] = $usuario_id; // Asigna el id del usuario a la sesión
        header('Location: index.php');
        exit();
    } else {
        $login_exitoso = false; // Contraseña incorrecta
    }
} else {
    $login_exitoso = false; // Usuario no encontrado
}

$stmt->close();
$conn->close();

// Manejar el caso de inicio de sesión fallido
if (!$login_exitoso) {
    // Redirigir de nuevo al formulario con un mensaje de error
    header('Location: login.php?error=credenciales_incorrectas');
    exit();
}
?>

Resumen

    login_exitoso: Esta variable se establece en true o false en función de si las credenciales proporcionadas por el usuario son correctas.
    Proceso:
        El usuario envía su nombre de usuario y contraseña a process_login.php.
        Este archivo verifica las credenciales en la base de datos.
        Si son correctas, se establece $_SESSION['user_id'] y se redirige al usuario a index.php.
        Si son incorrectas, se redirige de nuevo al formulario de inicio de sesión con un mensaje de error.


*/



//----------------------------

if (isset($_SESSION['user_id'])) {
//me voy a login... si ya hay sesion iniciada
    header('Location: index.php');

    exit();
} else {
    header('Location: login_register.php');
    exit();
}
?>
