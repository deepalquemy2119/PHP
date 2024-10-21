<?php
include 'connectDDBB.php';

// conexión
if ($conn) {
    echo "Conexión exitosa a la base de datos";
} else {
    echo "Error al conectar a la base de datos.";
}

//$conn->close();
