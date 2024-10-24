<?php
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        return;
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim(trim($value), "'\""); 
// la linea de arriba elimina comillas simples y dobles
            putenv("$key=$value"); 
// al usar getenv(). para mejorar la seguridad, lo voy a tratar de implementar al ir usando las var de entorno.
            define($key, $value);   
// constante
        }
    }
}

// función para cargar las variables.y asi no mostrar datos sensibles(.env)
loadEnv(__DIR__ . '/.env');
