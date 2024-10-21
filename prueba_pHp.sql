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
