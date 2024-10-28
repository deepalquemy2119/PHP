<?php
// para usar con borrado de cuentas

// include_once 'connectDDBB.php';
// include_once 'load_env.php';

// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// $user_id = $_SESSION['user_id'];

// $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
// $stmt->bind_param("i", $user_id);
// if ($stmt->execute()) {
//     session_destroy();
//     header("Location: goodbye.php");
// } else {
//     echo "Error al eliminar cuenta: " . $stmt->error;
// }
// $stmt->close();
