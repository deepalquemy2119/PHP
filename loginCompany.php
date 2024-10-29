<?php
session_start(); // Iniciar la sesión
include_once 'connectDDBB.php';
include_once 'load_env.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar credenciales
    $stmt = $conn->prepare("SELECT id_company, password FROM companies WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Credenciales inválidas.";
    } else {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Guardar datos de la empresa en la sesión
            $_SESSION['company_id'] = $row['id_company'];
            $_SESSION['company_email'] = $email;

            // Redirigir al panel de control
            header("Location: panelControl.php");
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    }
    $stmt->close();
}
//$conn->close();


