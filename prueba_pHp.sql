-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS prueba_php;

-- Crear la base de datos
CREATE DATABASE prueba_php;

-- Usar la base de datos creada
USE prueba_php;

-- Eliminar la tabla de usuarios si existe
DROP TABLE IF EXISTS users;

-- crear tabla user_id
CREATE TABLE `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL UNIQUE,
    `email` varchar(100) NOT NULL UNIQUE,
    `password` varchar(255) NOT NULL,
    `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`),
    CHECK (CHAR_LENGTH(username) > 0),
    CHECK (CHAR_LENGTH(email) > 0),
    CHECK (CHAR_LENGTH(password) >= 8)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Eliminar la tabla de compañías si existe
DROP TABLE IF EXISTS companies;

-- Crear la tabla de compañías
CREATE TABLE `companies` (
    `id_company` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `descripcion` text NOT NULL,
    `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_company`),
    CHECK (CHAR_LENGTH(nombre) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Eliminar la tabla de productos si existe
DROP TABLE IF EXISTS products;

-- Crear la tabla de productos
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

-- Eliminar la tabla de ofertas si existe
DROP TABLE IF EXISTS offers;

-- Crear la tabla de ofertas
CREATE TABLE `offers` (
    `id_offer` int(11) NOT NULL AUTO_INCREMENT,
    `id_product` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    `cantidad` int(11) NOT NULL CHECK (cantidad > 0),
    `fecha_oferta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_offer`),
    KEY `id_product` (`id_product`),
    KEY `id_user` (`id_user`),
    CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear la tabla de auditoría
CREATE TABLE `audit_log` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `action` ENUM('INSERT', 'UPDATE', 'DELETE') NOT NULL,
    `table_name` varchar(50) NOT NULL,
    `record_id` int(11) NOT NULL,
    `changed_by` int(11) NOT NULL,
    `changed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `audit_log_ibfk_1` FOREIGN KEY (`changed_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--     Tabla companies: Ahora es independiente y contiene información específica de cada compañía.
--     Tabla products: Cada producto está vinculado, y se ha añadido un campo precio para manejar el costo del producto o servicio.
--     Tabla offers: Esta tabla permite a los usuarios ofrecer productos a las compañías. Incluye una referencia a id_product y id_user, lo que permite hacer un seguimiento de quién está ofreciendo qué producto.
--     Uso de CHECK: Se han agregado restricciones CHECK para asegurar que los campos relevantes cumplan con las reglas de negocio (por ejemplo, que el precio no sea negativo).
--     Auditoría: La tabla de auditoría se mantiene para registrar los cambios realizados en los datos.

-- Beneficios:

--     Integridad de Datos: Las claves foráneas aseguran que no haya referencias huérfanas.
--     Eficiencia: Los índices mejoran el rendimiento de las consultas.
--     Flexibilidad: Este modelo permite que los usuarios interactúen con las compañías y ofrezcan productos de manera clara y eficiente.

-- Este diseño proporciona una base sólida para un e-commerce C2B, facilitando la gestión de usuarios, compañías y productos.