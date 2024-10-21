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
            $value = trim(trim($value), "'\""); // Elimina comillas simples y dobles
            putenv("$key=$value"); // Opcional, si deseas usar getenv()
            define($key, $value);   // Define la constante
        }
    }
}

// Llama a la función para cargar las variables
loadEnv(__DIR__ . '/.env');
