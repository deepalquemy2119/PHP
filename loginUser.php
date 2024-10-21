<?php
include_once 'connectDDBB.php';
include_once 'load_env.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar credenciales
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Credenciales inválidas.";
    } else {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Inicio de sesión exitoso.";
            // Aquí puedes iniciar una sesión y redirigir al usuario
            // session_start();
            // $_SESSION['user_email'] = $email;
            // header("Location: dashboard.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    }
    $stmt->close();
}
$conn->close();
