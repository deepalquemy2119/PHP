<?php


// function load_env($file) {
//     if (file_exists($file)) {
//         $lines = file($file);
//         foreach ($lines as $line) {
//             if (strpos($line, '=') !== false) {
//                 list($key, $value) = explode('=', trim($line), 2);
//                 $_ENV[$key] = trim($value);
//             }
//         }
//     }
// }

// // --- CARGAR VARIABLES DE ENTORNO ---
// function loadEnv($path, $requiredVars = []) {
//     if (file_exists($path)) {
//         $lines = file($path);
//         foreach ($lines as $line) {
//             // Ignorar líneas vacías y comentarios
//             if (empty(trim($line)) || strpos(trim($line), '#') === 0) {
//                 continue;
//             }
//             // Separar clave y valor
//             list($key, $value) = explode('=', $line, 2);
//             // Quitar espacios y comillas
//             $key = trim($key);
//             $value = trim($value);
//             $value = trim($value, "\"'"); // Eliminar comillas
//             // Definir la variable en el entorno
//             putenv("$key=$value");
//         }
//     }

//     // Validar que todas las variables requeridas estén definidas
//     foreach ($requiredVars as $var) {
//         if (getenv($var) === false) {
//             throw new Exception("La variable de entorno '$var' no está definida.");
//         }
//     }
// }


// // Cargar las variables desde el archivo .env
// load_env(__DIR__ . '/.env');
// // Variables requeridas
// $requiredVars = [

//     'localhost',           // Host de la base de datos  
//     'prueba_pHp',     // Nombre de la base de datos
//     'root',           // Usuario de la base de datos
//     '',           // Contraseña de la base de datos
// ];

// // Cargar las variables de entorno desde .env
// loadEnv(__DIR__ . '/.env', $requiredVars);

// // ---------- CONEXION A MYSQL DE PHPMYADMIN -----------
// $ddbbhost = getenv('localhost');
// $ddbbname = getenv('prueba_pHp');
// $ddbbuser = getenv('root');
// $ddbbpass = getenv('');

// try {
//     // Configuración de la conexión
//     $options = [
//         PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//         PDO::ATTR_EMULATE_PREPARES   => false,
//     ];

//     // Instancia de PDO
//     $pdo = new PDO("mysql:host=$ddbbhost;dbname=$ddbbname;charset=utf8mb4", $ddbbuser, $ddbbpass, $options);

//     // Configuración
//     $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false); // Para datos numéricos como números

// } catch (PDOException $e) {
//     // Manejo de errores
//     error_log("Connection failed: " . $e->getMessage()); // Registrar el error en un archivo de log
//     die("No se pudo conectar a la base de datos. Por favor, inténtalo más tarde."); 
// }

//----------------- Forzar un error ------------------
// trigger_error("Este es un error de prueba.", E_USER_WARNING);

// ------------------- Seguridad -------------------- 

// Entorno de Producción: En producción, es mejor gestionar las variables de entorno a través de la configuración del servidor o del contenedor (por ejemplo, en Docker) en lugar de un archivo .env.

//  <!-- ---------------- Prueba de captura de errores en file LOGS -------------------- -->
            
//             <?php
// // Forzar un error de prueba
// trigger_error("Este es un error de prueba.", E_USER_WARNING);

// // Forzar una división por cero
// $divisor = 0;
// $resultado = 10 / $divisor; // Esto generará un warning
// 
?>
            
<!-- --------------------- LIMITAR LA GUARDA DE ERRORES A 10 ----------------------- -->

<?php

// function log_error($message) {
//     $log_file = 'config/log_error.log';

//     // Leer el contenido actual del archivo
//     $errors = [];
//     if (file_exists($log_file)) {
//         $errors = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//     }

//     // Agregar el nuevo mensaje
//     $errors[] = date('Y-m-d H:i:s') . ' - ' . $message;

//     // Limitar a los últimos 10 errores
//     if (count($errors) > 10) {
//         $errors = array_slice($errors, -10);
//     }

//     // Escribir de nuevo al archivo
//     file_put_contents($log_file, implode(PHP_EOL, $errors) . PHP_EOL);
// }

// // Ejemplo de uso
// log_error("Este es un error de prueba.");
// $divisor = 0;
// if ($divisor == 0) {
//     log_error("Error: División por cero en " . __FILE__ . " en la línea " . __LINE__);
// }
?>
