<?php
include_once 'connectDDBB.php';
include_once 'load_env.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // controlo que el usuario ya está registrado
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "El correo electrónico ya está registrado.";
    } else {
        // Insertar nuevo usuario
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $password);
        
        if ($stmt->execute()) {
            echo "Registro exitoso.";
            // a otra página si es necesario
            // header("Location: ofertasTrabajo.php");
            exit();
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }
    }
    $stmt->close();
}
$conn->close();


//___________________________________________________________________________-
// para usar con registro en la base de datos

// include_once 'connectDDBB.php';
// include_once 'load_env.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = $_POST['email'];
//     $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashear la contraseña

//     $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
//     $stmt->bind_param("ss", $email, $password);
//     if ($stmt->execute()) {
//         echo "Cuenta creada con éxito.";
//     } else {
//         echo "Error al crear cuenta: " . $stmt->error;
//     }
//     $stmt->close();
// }
