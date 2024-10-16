<?php


//---------------- login.php ----------------

// Paso 1: Iniciar la sesión

// Antes de cualquier otra operación en el login,
// inicio sesión. Esto se hace con la función session_start().
session_start();

//------------
// importo la conexion a la DDBB
require_once('../../ddbb/conexiones/connectMySql.php');

// Configuración de la base de datos
$host = $ddbbhost; //localhost, sino IP.
$db = $ddbbname;
$user = $ddbbuser;
$pass = $ddbbpass;

try {
    // Crear una conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}


// controlo si se mando los datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//Capturo los datos del form y limpio
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

// Validación
    if (empty($name) || empty($email) || empty($password)) {
        echo "Por favor completa todos los campos.";
        exit();
    }

// Validar formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit();
    }

// Validar longitud del nombre de usuario
    if (strlen($name) < 4 || strlen($name) > 30) {
        echo "El nombre de usuario debe tener entre 3 y 30 caracteres.";
        exit();
    }

// Comprobar si el usuario existe
    $stmt = $pdo->prepare("SELECT * FROM user WHERE name = :name AND email = :email");
    $stmt->execute(['name' => $name, 'email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

// FETCH_ASSOC:obtengo datos del usuario, con PDO::FETCH_ASSOC este crea un array asociativo, lo que es más eficiente.


    if ($user) {
// Verificar la contraseña
        if (password_verify($password, $user['password'])) {

// Paso 2: Almacenar información en la sesión
    // Después de validar las credenciales del usuario y confirmar que son correctas, almacena información del usuario en la sesión.
            $_SESSION['user_id'] = $user['id']; 
//Suponiendo que 'id' es la clave primaria
            $_SESSION['name'] = $user['name'];
            echo "Inicio de sesión exitoso.";
            header("Location: Pagina de Usuario Logueado"); 
// Cambio a la página de Inicio de usuario. 
            exit();
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

//Paso 3: Cerrar la sesión

// Según leí, es mejor hacer por separado un file, y cerrar desde allí: location: View/LoginView/logout.php.


// Paso 4: Seguridad para las views

// Para asegurar que solo los usuarios autenticados accedan a ciertas páginas, verifica la sesión al comienzo de esas páginas. Location: View/auth.php:

?>


<!-- // Funcion para manejar los datos del perfil del usuario después de iniciar sesión con Google
        // function onSignIn(googleUser) {
        //     // This function will be called after successful sign-in.
        //     var profile = googleUser.getBasicProfile();
        //     console.log('ID: ' + profile.getId());
        //     console.log('Name: ' + profile.getName());
        //     console.log('Image URL: ' + profile.getImageUrl());
        //     console.log('Email: ' + profile.getEmail());
            // Optionally, send profile data to your server
            // Example:
            // var xhr = new XMLHttpRequest();
            // xhr.open('POST', '/path/to/your/server/endpoint.php');
            // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // xhr.send('id=' + profile.getId() + '&name=' + profile.getName() + '&email=' + profile.getEmail());
        // }

        // function signOut() {
        //     var auth2 = gapi.auth2.getAuthInstance();
        //     auth2.signOut().then(function () {
        //         console.log('User signed out.');
        //     });
        // }
?> -->