
CREATE TABLE `users` (
  `IdUser` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FK_IdUser` bigint(20) unsigned NOT NULL,
  `Name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` text COLLATE utf8mb4_unicode_ci,
  `Phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Discount` double(16,2) DEFAULT NULL,
  `BusinessName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfdi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rfc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` enum('Físico','Moral') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Location` enum('Bodega GDL','Bodega CDMX','Tienda') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role` enum('Administrador','Vendedor','Mayorista','Coordinador de Almacen','Encargado de Facturacion') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdUser`),
  KEY `users_FK` (`FK_IdUser`),
  CONSTRAINT `users_FK` FOREIGN KEY (`FK_IdUser`) REFERENCES `users` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `addresses` (
  `IdAddress` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FK_IdUser` bigint(20) unsigned NOT NULL,
  `ContactName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostalCode` int(11) DEFAULT NULL,
  `Neighborhood` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `State` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` enum('Default','Usuario') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAddress`),
  KEY `addresses_FK` (`FK_IdUser`),
  CONSTRAINT `addresses_FK` FOREIGN KEY (`FK_IdUser`) REFERENCES `users` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `billingsdatas` (
  `IdBillingdata` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FK_IdUser` bigint(20) unsigned NOT NULL,
  `IqualAddress` tinyint(4) DEFAULT NULL,
  `ContactName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostalCode` int(11) DEFAULT NULL,
  `Neighborhood` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `State` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` enum('Default','Usuario') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdBillingdata`),
  KEY `billingsdatas_FK` (`FK_IdUser`),
  CONSTRAINT `billingsdatas_FK` FOREIGN KEY (`FK_IdUser`) REFERENCES `users` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ciudades` (
  `CMunicipio` int(11) DEFAULT NULL,
  `CEstado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `codigos_postales` (
  `CCp` int(11) DEFAULT NULL,
  `CEstado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CMunicipio` int(11) DEFAULT NULL,
  `CLocalidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `colonias` (
  `CColonia` int(11) DEFAULT NULL,
  `CCodigoPostal` int(11) DEFAULT NULL,
  `CNombreAsentamiento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `estados` (
  `CEstado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NombreEstado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;