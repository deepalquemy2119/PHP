<?php
session_start();
include_once 'connectDDBB.php';

// Verificar si la empresa ha iniciado sesión
if (!isset($_SESSION['company_id'])) {
    header("Location: login_register.php");
    exit;
}

$companyId = $_SESSION['company_id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitudes - Mi Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white text-center p-3">
        <h1>Solicitudes Recibidas</h1>
    </header>
    <div class="container mt-5">
        <h2>Solicitudes para tus Ofertas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Oferta</th>
                    <th>Usuario</th>
                    <th>Fecha de Solicitud</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Obtener solicitudes para las ofertas de la empresa
                $query = "
                    SELECT ja.fecha_solicitud, jo.titulo, u.username
                    FROM job_applications ja
                    JOIN job_offers jo ON ja.id_offer = jo.id_offer
                    JOIN users u ON ja.id_user = u.id
                    WHERE jo.id_company = ?
                ";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $companyId);
                $stmt->execute();
                $applicationsResult = $stmt->get_result();

                while ($application = $applicationsResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($application['titulo']) . "</td>";
                    echo "<td>" . htmlspecialchars($application['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($application['fecha_solicitud']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="panelControl.php" class="btn btn-secondary">Volver al Panel de Control</a>
    </div>
</body>
</html>
