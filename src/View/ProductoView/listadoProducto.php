<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Listado de Productos</h1>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li>
                <a href="/public/pagina-producto.php?id=<?php echo $producto['id_producto']; ?>">
                    <?php echo htmlspecialchars($producto['nombre']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
