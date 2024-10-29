# Investigacion Hecha

# Tipos de E-Commerce

 B2B : Business to Business: negocio a negocio
 B2C : Business to Consumer: de negocio a consumidor
 C2B : Consumer to Business: de consumidor a negocio
 C2C : Consumer to Consumer: de consumidor a consumidor
 B2A : Business to Administration: de negocio a administración
 C2A : Consumer to Administration: de consumidor a administración

Seleccion de Tipo de E-Commerce

C2B: Consumer to Business

El comercio C2B es aquel que se da entre el cliente y una empresa. En este modelo es el consumidor el que realiza una oferta a la empresa sobre un producto o servicio y establece las condiciones de una transacción. La pyme también pude adquirir los servicios o productos del consumidor si los requiere y la negociación se da entre ambas partes.

Ventajas: 
    Permite a los consumidores ofrecer productos o servicios a empresas; puede ser un modelo innovador para ciertos nichos de mercado.
Desventajas: 
    Menor escala en comparación con B2B o B2C; la aceptación puede variar según el sector.

Examples ( C2B ): El modelo C2B (Consumer to Business) es menos común que otros modelos de comercio electrónico, algunos ejemplos de ecommerce C2B:

Plataformas de Freelance:
    Upwork: Los freelancers (consumidores) ofrecen sus habilidades y servicios a empresas (negocios) en una variedad de campos, desde diseño gráfico hasta desarrollo de software.
    Freelancer: Similar a Upwork, permite a los profesionales independientes ofrecer sus servicios a empresas para proyectos específicos.

Plataformas de Creación de Contenido:
    99designs: Los diseñadores gráficos (consumidores) compiten para crear diseños para empresas (negocios). Las empresas seleccionan los diseños que mejor se ajustan a sus necesidades.
    Crowdspring: Permite a los diseñadores ofrecer sus conceptos a empresas que buscan diseños personalizados para logotipos, sitios web, y más.

Microtrabajos y Tareas en Línea:
    Amazon Mechanical Turk: Los consumidores realizan pequeñas tareas o microtrabajos para empresas, como etiquetar datos o completar encuestas.
    Clickworker: Ofrece tareas como redacción, categorización de datos y encuestas para que los trabajadores independientes las realicen a cambio de una compensación.

Venta de Fotografías y Contenido Multimedia:
    Shutterstock: Los fotógrafos (consumidores) venden sus imágenes y videos a empresas que buscan contenido visual para sus proyectos.
    iStock: Similar a Shutterstock, los creadores de contenido visual ofrecen sus imágenes y vídeos a empresas para su uso en publicidad, medios digitales, etc.

Plataformas de Influencers:
    AspireIQ: Los influencers y creadores de contenido (consumidores) colaboran con marcas (negocios) para promover productos o servicios en redes sociales y otros canales.
    Influencity: Permite a las marcas encontrar y contratar influencers para campañas de marketing.

Plataformas de Opiniones y Reseñas:
    Testbirds: Los testers de software (consumidores) prueban aplicaciones y sitios web para detectar errores y proporcionar feedback a las empresas.
    UserTesting: Los consumidores proporcionan comentarios sobre la usabilidad de sitios web y aplicaciones, ayudando a las empresas a mejorar sus productos.

Estos ejemplos muestran cómo el modelo C2B puede funcionar en diversas áreas, permitiendo a los consumidores ofrecer sus habilidades, servicios o productos a empresas que buscan aprovechar el talento y la creatividad de individuos fuera de su organización.
Nombre del Proyecto: Back_PHP

# E-Commerce del tipo C2B: Consumer to Business


# Descripción

Este proyecto es una aplicación de eCommerce desarrollada en PHP, sin el uso de frameworks como Laravel. Utiliza MySQL como sistema de gestión de bases de datos y está diseñado para ejecutarse en un entorno local con XAMPP. El objetivo es proporcionar una plataforma donde los usuarios puedan registrarse, explorar productos y realizar compras.

## Requisitos

- PHP 7.4 o superior
- MySQL
- XAMPP (o cualquier servidor local compatible)


# Iniciar XAMPP:
        Asegúrate de que Apache y MySQL están en ejecución.

# Configurar la base de datos:
        Accede a phpMyAdmin en tu navegador: http://localhost/phpmyadmin
        Crea una nueva base de datos llamada prueba_php.
        Ejecuta el siguiente script SQL para crear las tablas necesarias:

# SQL

Ver ----> prueba_pHp.sql

# Configurar el archivo de conexión a la base de datos:
        

# Funcionalidades

    Registro de usuarios y de empresas
    Login de empresas y usuarios
    Gestión de productos y servicios
    Visualización de ofertas
    Gestión de órdenes





2. **Documentación de la base de datos**: Se incluye un script SQL para la creación de la base de datos y las tablas, facilitando el proceso de configuración. 

DDBB: 

-- Crear base de datos
DROP DATABASE IF EXISTS prueba_php;
CREATE DATABASE prueba_php;
USE prueba_php;

-- tabla de usuarios
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL UNIQUE,
    `email` varchar(100) NOT NULL UNIQUE,
    `password` varchar(255) NOT NULL,
    `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CHECK (CHAR_LENGTH(username) > 0),
    CHECK (CHAR_LENGTH(email) > 0),
    CHECK (CHAR_LENGTH(password) >= 8)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla de servicios
CREATE TABLE `services` (
    `id_service` int(11) NOT NULL AUTO_INCREMENT,
    `id_user` int(11) NOT NULL,
    `nombre_servicio` varchar(100) NOT NULL,
    `descripcion_servicio` text NOT NULL,
    `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_service`),
    KEY `id_user` (`id_user`),
    CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CHECK (CHAR_LENGTH(nombre_servicio) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla de compañías
CREATE TABLE `companies` (
    `id_company` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `email` varchar(100) NULL,
    `password` varchar(255) NOT NULL,
    `descripcion` text NOT NULL,
    `busca_servicio` varchar(255) DEFAULT NULL,
    `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_company`),
    CHECK (CHAR_LENGTH(nombre) > 0),
    CHECK (CHAR_LENGTH(busca_servicio) >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla de ofertas de empleo
CREATE TABLE `job_offers` (
    `id_offer` int(11) NOT NULL AUTO_INCREMENT,
    `id_company` int(11) NOT NULL,
    `titulo` varchar(100) NOT NULL,
    `descripcion` text NOT NULL,
    `fecha_publicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_offer`),
    KEY `id_company` (`id_company`),
    CONSTRAINT `job_offers_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
    CHECK (CHAR_LENGTH(titulo) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla de solicitudes de empleo
CREATE TABLE `job_applications` (
    `id_application` int(11) NOT NULL AUTO_INCREMENT,
    `id_offer` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    `fecha_solicitud` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_application`),
    KEY `id_offer` (`id_offer`),
    KEY `id_user` (`id_user`),
    CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `job_offers` (`id_offer`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `job_applications_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla de rubros
CREATE TABLE `rubros` (
    `id_rubro` int(11) NOT NULL AUTO_INCREMENT,
    `nombre_rubro` varchar(100) NOT NULL UNIQUE,
    PRIMARY KEY (`id_rubro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla para relacionar empresas con rubros
CREATE TABLE `company_rubros` (
    `id_company` int(11) NOT NULL,
    `id_rubro` int(11) NOT NULL,
    PRIMARY KEY (`id_company`, `id_rubro`),
    FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_rubro`) REFERENCES `rubros` (`id_rubro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla de habilidades
CREATE TABLE `skills` (
    `id_skill` int(11) NOT NULL AUTO_INCREMENT,
    `nombre_skill` varchar(100) NOT NULL UNIQUE,
    PRIMARY KEY (`id_skill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla para relacionar usuarios con habilidades
CREATE TABLE `user_skills` (
    `id_user` int(11) NOT NULL,
    `id_skill` int(11) NOT NULL,
    PRIMARY KEY (`id_user`, `id_skill`),
    FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `sessions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `session_token` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `expires_at` TIMESTAMP NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `logs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `action` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#----------------------------------------------
# Inicio de sesion de Empresa o de suario 
( control de sesion y seguridad. Validaciones )

USO DE ISSET(): 
En PHP, la función isset() se utiliza para determinar si una variable está definida y no es null.
     Es muy útil para verificar si se ha establecido una variable antes de intentar utilizarla, evitando errores en tiempo de ejecución.
Uso de isset():

    $nombre = "Juan";

    if (isset($nombre)) {
        echo "La variable \$nombre está definida y no es null.";
    } else {
        echo "La variable \$nombre no está definida.";
    }

Características de isset()
    Devuelve true: Si la variable está definida y no es null.
    Devuelve false: Si la variable no está definida o es null.

    Puede tomar múltiples variables: 
        Si se pasan varias variables como argumentos, isset() devolverá true solo si todas las variables están definidas y no son null.

    $a = "Hola";
    $b = null;

    if (isset($a, $b)) {
        echo "Ambas variables están definidas y no son null.";
    } else {
        echo "Al menos una variable no está definida o es null.";
    }

Ejemplo en un formulario
    isset() se utiliza a menudo para comprobar si se han enviado datos de un formulario:


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        echo "Nombre recibido: " . $nombre;
    } else {
        echo "No se recibió el nombre.";
    }
}

//--------------------------------------------------------------


Para mostrar solo el mensaje correspondiente según la acción realizada (registro o login de usuario o compañía), puedes utilizar un parámetro en la URL para determinar qué mensaje mostrar. A continuación, te muestro un ejemplo modificado del HTML que hace esto.
Ejemplo de HTML Dinámico

html

<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de Éxito</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            text-align: center;
        }
        .message {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .error {
            background-color: #f44336;
        }
    </style>
</head>
<body> -->

    <!-- <h1>Mensajes de Éxito</h1>

    <?php
        // Obtener el parámetro de la URL
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        // Mensajes basados en la acción
        switch ($action) {
            case 'register_user':
                echo '<div class="message">
                        <h2>Registro de Usuario Exitoso</h2>
                        <p>¡Te has registrado correctamente! Ya puedes iniciar sesión.</p>
                      </div>';
                break;

            case 'register_company':
                echo '<div class="message">
                        <h2>Registro de Compañía Exitoso</h2>
                        <p>¡La compañía se ha registrado correctamente! Inicia sesión para comenzar.</p>
                      </div>';
                break;

            case 'login_user':
                echo '<div class="message">
                        <h2>Login de Usuario Exitoso</h2>
                        <p>¡Bienvenido de nuevo! Has iniciado sesión correctamente.</p>
                      </div>';
                break;

            case 'login_company':
                echo '<div class="message">
                        <h2>Login de Compañía Exitoso</h2>
                        <p>¡Bienvenido de nuevo! Has iniciado sesión correctamente.</p>
                      </div>';
                break;

            default:
                echo '<div class="error">
                        <h2>Error</h2>
                        <p>No se ha especificado ninguna acción válida.</p>
                      </div>';
                break;
        }
    ?>

    <a href="index.html" style="display: inline-block; margin-top: 20px; text-decoration: none; background-color: #2196F3; color: white; padding: 10px 15px; border-radius: 5px;">Volver a Inicio</a>

<!-- </body>
</html> -->


    Parámetro de URL: Este código PHP usa el parámetro action de la URL para determinar qué mensaje mostrar. Por ejemplo, la URL puede ser success.html?action=register_user.

    Estructura switch: Dependiendo del valor de action, se muestra el mensaje correspondiente:
        register_user: Mensaje de registro de usuario.
        register_company: Mensaje de registro de compañía.
        login_user: Mensaje de inicio de sesión de usuario.
        login_company: Mensaje de inicio de sesión de compañía.
        Si no se pasa un valor válido, se muestra un mensaje de error.

    Enlace de Navegación: Se mantiene el enlace para volver a la página de inicio.

Uso

Para mostrar un mensaje específico, redirige a los usuarios a esta página con el parámetro adecuado en la URL. Por ejemplo:

    Para un registro de usuario exitoso: success.html?action=register_user
    Para un registro de compañía exitoso: success.html?action=register_company
    Para un inicio de sesión de usuario exitoso: success.html?action=login_user
    Para un inicio de sesión de compañía exitoso: success.html?action=login_company

Esto asegura que solo se muestre el mensaje relevante según la acción realizada.

//-----------------------------------------------------------
