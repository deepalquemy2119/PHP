<?php
function loadEnv($file) {
    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0 || trim($line) === '') {
                continue;
            }
            list($key, $value) = explode('=', trim($line), 2);
            putenv(trim($key) . '=' . trim($value));
        }
    }
}

loadEnv(__DIR__ . '/.env');
?>
