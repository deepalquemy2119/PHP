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

-- Crear usuario y otorgar permisos
-- CREATE USER 'root9112'@'localhost' IDENTIFIED BY 'Utn54200593$&?';
-- GRANT ALL PRIVILEGES ON prueba_php.* TO 'root9112'@'localhost' WITH GRANT OPTION;
-- FLUSH PRIVILEGES;

-- Crear base de datos
DROP DATABASE IF EXISTS prueba_php;
CREATE DATABASE prueba_php;
USE prueba_php;

-- Crear tabla de usuarios
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

-- Crear tabla de compañías
CREATE TABLE `companies` (
    `id_company` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `email` varchar(100) NULL,
    `descripcion` text NOT NULL,
    `busca_servicio` varchar(255) DEFAULT NULL,
    `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_company`),
    CHECK (CHAR_LENGTH(nombre) > 0),
    CHECK (CHAR_LENGTH(busca_servicio) >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear tabla de productos
CREATE TABLE `products` (
    `id_product` int(11) NOT NULL AUTO_INCREMENT,
    `id_company` int(11) NOT NULL,
    `nombre_producto` varchar(100) NOT NULL,
    `descripcion_producto` text NOT NULL,
    `precio` decimal(10, 2) NOT NULL CHECK (precio >= 0),
    `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_product`),
    KEY `id_company` (`id_company`),
    CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
    CHECK (CHAR_LENGTH(nombre_producto) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear tabla de servicios
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

-- Crear tabla de ofertas de empleo
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

-- Crear tabla de solicitudes de empleo
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

-- Crear tabla de auditoría para solicitudes
CREATE TABLE `job_application_audit_log` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `action` ENUM('INSERT', 'UPDATE', 'DELETE') NOT NULL,
    `application_id` int(11) NOT NULL,
    `changed_by` int(11) NOT NULL,
    `changed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `job_application_audit_log_ibfk_1` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `job_application_audit_log_ibfk_2` FOREIGN KEY (`application_id`) REFERENCES `job_applications` (`id_application`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear tabla de auditoría para servicios
CREATE TABLE `service_audit_log` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `action` ENUM('INSERT', 'UPDATE', 'DELETE') NOT NULL,
    `service_id` int(11) NOT NULL,
    `changed_by` int(11) NOT NULL,
    `changed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `service_audit_log_ibfk_1` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `service_audit_log_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id_service`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE users ADD UNIQUE (email);
ALTER TABLE users ADD UNIQUE (username);
ALTER TABLE companies ADD UNIQUE (email);
ALTER TABLE companies ADD UNIQUE (nombre);


#----------------------------------------------
