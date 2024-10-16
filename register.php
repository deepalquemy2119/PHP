<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ----------- Bootstrap ------------ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- ------------ GOOGLE FONTS ------------- -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    

    <!-- ------------- CSS local ---------------- -->

    <link rel="stylesheet" href="../css/register.css">
     
    <title>Human Being Register</title>

    <link rel="stylesheet" href="./public/css/register.css">
     
    <title>C2B Register</title>

</head>
<body>
    <h1 class="form m-3">Register</h1>

    <header>

    <!-- Como no tengo un servidor. Lo mando de nuevo al inicio -->
        <form class="container" action="index.php" method="get">
            <!-- --------- username --------- -->
            <div class="col-md-3">
                <label for="username">Username</label><br>
                <input type="text" class="form-control" id="username" placeholder="username"><br>
                
            </div>         
            
            <!-- ----------- email ---------- -->
            <div class="col-md-3">
                <label for="floatingInput">Email address</label><br>
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"><br>
                
            </div>

          
            <!-- ----------- password ---------- -->
            <div class="col-md-3">
                <label for="floatingPassword">Password</label><br>
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"><br>
                
            </div>

            <div class="col-md-3">
                <div class="botones justify-content-between mb-5">

                    <a><input type="submit" class="back btn btn-warning" value="Back"></a>
                    <a><input type="submit" class="send btn btn-success" value="Send"></a>

                    
                </div>

            </div>
                
            </form>
        </header>
    <footer>
        
        <p class="text-footer">&copy;Gonzalo Rodrigo. DeepAlquemy2024 </p>
        
     
    </footer>
</body>
</html>


<?php
session_start();
include './load_env.php'; 
// Incluir para cargar variables de entorno
include './connectDDBB.php'; 
// Incluir conexión a la base de datos

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba_php"; // Asegúrate de que sea la misma

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recoger datos del formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validar si el nombre de usuario ya existe
    $usernameCheck = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($usernameCheck->num_rows > 0) {
        $_SESSION['error'] = 'El nombre de usuario ya está en uso.';
        header('Location: index.php');
        exit();
    }

    // Validar si el correo electrónico ya existe
    $emailCheck = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($emailCheck->num_rows > 0) {
        $_SESSION['error'] = 'El correo electrónico ya está en uso.';
        header('Location: index.php');
        exit();
    }

    // Insertar nuevo usuario
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Registro exitoso. Puedes iniciar sesión.';
    } else {
        $_SESSION['error'] = 'Error al registrar el usuario.';
    }

    $stmt->close();
    $conn->close();
    header('Location: index.php');
    exit();
}

?>