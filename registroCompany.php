<?php
include_once 'connectDDBB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $descripcion = $_POST['descripcion_empresa'];
    $busca_servicio = $_POST['busca_empresa'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
// controlo si la empresa ya está registrada
    $stmt = $conn->prepare("SELECT * FROM companies WHERE nombre = ? OR email = ?");
    $stmt->bind_param("ss", $empresa, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "El correo electrónico o el nombre de la empresa ya están registrados.";
    } else {
// meter nueva empresa
        $stmt = $conn->prepare("INSERT INTO companies (nombre, email, password, descripcion, busca_servicio) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $empresa, $email, $password, $descripcion, $busca_servicio);
        
        if ($stmt->execute()) {
// ID de la nueva empresa
            $id_company = $conn->insert_id; 
            
// meter rubros seleccionados
            if (!empty($_POST['rubros'])) {
                $rubros_seleccionados = $_POST['rubros'];
                foreach ($rubros_seleccionados as $id_rubro) {
                    $stmt = $conn->prepare("INSERT INTO company_rubros (id_company, id_rubro) VALUES (?, ?)");
                    $stmt->bind_param("ii", $id_company, $id_rubro);
                    $stmt->execute();
                }
            }
            
            echo "Registro exitoso.";
            header("Location: home.php");
            exit();
        } else {
            echo "Error al registrar la compañía: " . $stmt->error;
        }
    }
    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empresa</title>
</head>
<body>
    <form action="registroCompany.php" method="post">
<!-- --------------------- Campos del formulario -------------------- -->
        <div>
            <label for="empresa">Nombre de la Empresa</label>
            <input type="text" id="empresa" name="empresa" required>
        </div>
        <div>
            <label for="email_empresa">Correo Electrónico</label>
            <input type="email" id="email_empresa" name="email" required>
        </div>
        <div>
            <label for="descripcion_empresa">Descripción Empresa</label>
            <input type="text" id="descripcion_empresa" name="descripcion_empresa" required>
        </div>
        <div>
            <label for="busca_empresa">Descripción Servicio Busca</label>
            <input type="text" id="busca_empresa" name="busca_empresa" required>
        </div>
        <div>
            <label for="password_empresa">Contraseña</label>
            <input type="password" id="password_empresa" name="password" required>
        </div>
        <div>
            <label for="rubros">Selecciona los Rubros:</label>
            <select name="rubros[]" id="rubros" multiple required>
                <option value="1">Tecnología</option>
                <option value="2">Salud</option>
                <option value="3">Educación</option>
                <option value="4">Construcción</option>

            </select>
        </div>
        <a href="login_register.php" class="btn btn-primary m-3">Back</a>
        <input type="submit" class="btn btn-success m-3" value="Enviar">
    </form>
</body>
</html>
