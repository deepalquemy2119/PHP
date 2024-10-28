<?php
include_once 'connectDDBB.php';
include_once 'load_env.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

// controlo credenciales
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
/* $stmt = estamos creando una variable para almacenar la declaración preparada.

    $conn->prepare(...): 
        llama al método prepare() en el objeto de conexión $conn.
    Este método prepara una consulta SQL para su ejecución.

    Consulta(a la DDBB):
         "SELECT password FROM users WHERE email = ?" es la consulta SQL.
        ?: Es un marcador de posición que se reemplazará por un valor real más adelante (esto ayuda a prevenir inyecciones SQL).
        
        $stmt->bind_param(...): 
            Este método se usa para enlazar parámetros a la consulta preparada.

    "s": Indica el tipo de dato del parámetro que se está vinculando. En este caso, "s" significa que el parámetro es una cadena (string).
    $email: 
        Es la variable que contiene el valor que se pasará al marcador de posición ? en la consulta.

    $stmt->execute();:
        Este método ejecuta la consulta SQL que se ha preparado y enlazado. En este punto, se envía la consulta al servidor de la base de datos.

    
    $result = $stmt->get_result();:
        Este método se utiliza para obtener el resultado de la consulta ejecutada.

    $result: 
        Aquí estamos almacenando el conjunto de resultados devuelto por la consulta. Este objeto se puede utilizar para acceder a las filas de datos que coinciden con la consulta.

    RESUMEN:  
            Preparar la consulta: prepare() permite definir una consulta SQL y utilizar marcadores de posición.
            Enlazar parámetros: bind_param() se utiliza para vincular variables a esos marcadores de posición, especificando el tipo de dato.
            Ejecutar la consulta: execute() ejecuta la consulta con los parámetros vinculados.
            Obtener resultados: get_result() permite acceder a los resultados devueltos por la consulta
    */


    //  verifica las credenciales de inicio de sesión de un usuario en una base de datos.

    if ($result->num_rows === 0) {
        echo "Credenciales inválidas.";
/* if ($result->num_rows === 0): 
    Aquí se verifica si el número de filas en el resultado de la consulta es igual a cero.

    $result->num_rows: 
        Esta propiedad devuelve el número de filas en el conjunto de resultados.
     */ 

    } else {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            //echo "Inicio de sesión exitoso.---!!";
/* else {: Si hay al menos una fila (es decir, el usuario existe), se ejecuta este bloque.

$row = $result->fetch_assoc();: 
    Aquí se obtiene la siguiente fila del conjunto de resultados como un array asociativo.

fetch_assoc(): 
    Este método devuelve la fila actual como un array, donde las claves son los nombres de las columnas(de las tablas). 
    En este caso, se espera que contenga el campo password. 
if (password_verify($password, $row['password'])) {:
    Se verifica si la contraseña ingresada por el usuario coincide con la contraseña almacenada en la base de datos.

password_verify(): 
    Esta función toma dos argumentos: la contraseña sin procesar ($password) y la contraseña hasheada almacenada ($row['password']). Si coinciden, devuelve true.
    */  
//_____________________________________________
// iniciar sesión. redirigir al usuario
            session_start();
            $_SESSION['user_email'] = $email;
            header("Location: ofertasTrabajo.php");
//______________________________________________

        } else {
            echo "Contraseña incorrecta.";
        }

    }
    $stmt->close();
/* Cierra la declaración preparada. Es una buena práctica liberar los recursos asociados a la declaración cuando ya no son necesarios */
}
//$conn->close();
/* se cerrará la conexión a la base de datos. Esto también es una buena práctica, aunque no siempre es necesario al final de un script, ya que PHP cerrará automáticamente la conexión al finalizar el script */


//__________________________________________________________________________________
// para usar con logeo y sesiones. con registro enla base de datos

// include_once 'connectDDBB.php';
// include_once 'load_env.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows === 0) {
//         echo "Credenciales inválidas.";
//     } else {
//         $row = $result->fetch_assoc();
//         if (password_verify($password, $row['password'])) {
//             session_start();
//             $_SESSION['user_email'] = $email;
//             $_SESSION['user_id'] = $row['id'];

//             // Generar token de sesión y guardar en la base de datos
//             $sessionToken = bin2hex(random_bytes(32));
//             $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));
//             $stmt = $conn->prepare("INSERT INTO sessions (user_id, session_token, expires_at) VALUES (?, ?, ?)");
//             $stmt->bind_param("iss", $row['id'], $sessionToken, $expiresAt);
//             $stmt->execute();

//             // Redirigir al usuario
//             header("Location: ofertasTrabajo.php");
//         } else {
//             echo "Contraseña incorrecta.";
//         }
//     }
//     $stmt->close();
// }
