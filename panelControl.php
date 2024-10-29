<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - <?php echo htmlspecialchars($company['nombre']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white text-center p-3">
        <h1>Bienvenido, <?php echo htmlspecialchars($company['nombre']); ?></h1>
    </header>
    <div class="container mt-5">
        <h2>Gestión de Ofertas de Trabajo</h2>
        <div class="mb-3">
            <a href="crearOferta.php" class="btn btn-success mb-3">Crear Nueva Oferta</a>
            <a href="verSolicitudes.php" class="btn btn-info mb-3">Ver Solicitudes</a>
            <a href="cerrarSesion.php" class="btn btn-danger mb-3">Cerrar Sesión</a>
        </div>

        <h3>Ofertas Actuales</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Obtener ofertas de trabajo de la empresa
                $query = "SELECT * FROM job_offers WHERE id_company = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $companyId);
                $stmt->execute();
                $offersResult = $stmt->get_result();

                while ($offer = $offersResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($offer['titulo']) . "</td>";
                    echo "<td>" . htmlspecialchars($offer['descripcion']) . "</td>";
                    echo "<td>" . htmlspecialchars($offer['fecha_publicacion']) . "</td>";
                    echo "<td>
                            <a href='editarOferta.php?id={$offer['id_offer']}' class='btn btn-warning m-2'>Editar</a>
                            <a href='eliminarOferta.php?id={$offer['id_offer']}' class='btn btn-danger'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<!-- Botón "Crear Nueva Oferta": Este botón te lleva al formulario de creación de ofertas.

    Botón "Ver Solicitudes": Este botón puede llevar a otra página (por ejemplo, verSolicitudes.php) donde se pueden ver las solicitudes de trabajo recibidas para las ofertas de la empresa.

    Botón "Cerrar Sesión": Este botón puede llevar a un script que maneje la sesión del usuario y cierre la sesión correctamente, redirigiendo al usuario a la página de inicio de sesión. O de cerrarSesion.php -->