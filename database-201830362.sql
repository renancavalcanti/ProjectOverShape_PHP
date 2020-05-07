-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.36-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para project2_renan
CREATE DATABASE IF NOT EXISTS `project2_renan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `project2_renan`;

-- Copiando estrutura para tabela project2_renan.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customeruuid` char(36) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `province` varchar(25) NOT NULL,
  `postalcode` varchar(7) NOT NULL,
  `username` varchar(12) NOT NULL,
  `passwordenc` varchar(255) NOT NULL,
  `createdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifydatetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customeruuid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela project2_renan.customers: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customeruuid`, `firstname`, `lastname`, `address`, `city`, `province`, `postalcode`, `username`, `passwordenc`, `createdatetime`, `modifydatetime`) VALUES
	('04d09843-8b1c-11ea-8538-e9d3647b3dbd', 'Vovo', 'Barros', 'Rue de Lrlaid', 'Recife', 'PE', 'H5H9L2', 'helena', '*7148BF452EC6C2AC332B6952265E9768D42FAA0D', '2020-04-30 16:51:44', NULL),
	('0db18f30-8b1d-11ea-8538-e9d3647b3dbd', 'Helena', 'Barros', 'rue de l\'eglise', 'Montreal', 'QC', 'H4T2L8', 'helen', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-04-30 16:59:08', NULL),
	('44e25855-8b27-11ea-8538-e9d3647b3dbd', 'Cami', 'Cat', '140, rue de l\'eglise', 'Montreal', 'Quebec', 'H4G2L9', 'camimayer', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-04-30 18:12:16', '2020-04-30 18:18:35'),
	('5da1fdbb-8b28-11ea-8538-e9d3647b3dbd', 'Teo', 'Corno', 'rue de Cornicelio', 'Olinda', 'PE', 'G4L9K2', 'teocorno', '*B8A8CFDA7D3F093FEC109A6280A11399D3EBBE99', '2020-04-30 18:20:07', NULL),
	('632458c3-8b1e-11ea-8538-e9d3647b3dbd', 'Pedro', 'Conde', 'Rue de Lrlaid', 'Recife', 'PE', 'H5H9L2', 'pedinho', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-04-30 17:08:41', '2020-04-30 17:16:30'),
	('68e6c7e2-8822-11ea-a182-a880882a3ba8', 'Yuri', 'Conde', '24, rue Verdun', 'Montreal', 'Quebec', 'I8H9L3', 'dadinho', '*EE0325BCD0009AB6CEF6AE88A8B263D607F899E2', '2020-04-26 21:59:55', NULL),
	('80315ab8-880c-11ea-a182-a880882a3ba8', 'Romildo', 'Barros', '130 rue Mont Royal', 'Toronto', 'Ontario', 'H7H9L2', 'romirego', '*6A7A490FB9DC8C33C2B025A91737077A7E9CC5E5', '2020-04-26 19:23:05', NULL),
	('83122b2b-8b1b-11ea-8538-e9d3647b3dbd', 'VovÃ³', 'Helena', '43 rue Grasiela', 'Imbiribeira', 'PE', 'H4D2L0', 'heleninha', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', '2020-04-30 16:48:06', NULL),
	('83a3b26a-8822-11ea-a182-a880882a3ba8', 'Sandra', 'Pires', '140, rue Sherbrooke', 'Montreal', 'Quebec', 'I8H9L3', 'sadroca', '*F6972DCA6A9CE44128E4356063FC6BA83DF7DC21', '2020-04-26 22:00:40', '2020-04-26 22:37:12'),
	('8c737060-84f3-11ea-8aea-8cd174d2c150', 'Renan', 'Barros', '', 'Recife', 'PE', 'H4G2L9', 'renancavalc', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-04-22 20:46:55', NULL),
	('b688edc8-880b-11ea-a182-a880882a3ba8', 'Rogerio', 'Aguiar', '140, rue de l\'eglise', 'Montreal', 'Quebec', 'H4G2L9', 'rogerthat', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', '2020-04-26 19:17:27', NULL),
	('c7f2d2a1-87ed-11ea-a182-a880882a3ba8', 'Wilma', 'Aguiar', '140, rue de l\'eglise', 'Montreal', 'Quebec', 'H4G2L9', 'wilmacarmem', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-04-26 15:43:11', NULL),
	('cf68bab9-84f3-11ea-8aea-8cd174d2c150', 'Daniel', 'Carvalho', '', 'Montreal', 'QC', 'H4G2T9', 'danielcarv', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-04-22 20:48:47', NULL),
	('cf70c836-84f3-11ea-8aea-8cd174d2c150', 'Camila', 'Mayer', '', 'Toronto', 'ON', 'H7Y2L9', 'camicat', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-04-22 20:48:48', NULL),
	('cf7cb810-84f3-11ea-8aea-8cd174d2c150', 'Alice', 'Mayer', 'rue Verdun', 'Verdun', 'QB', 'H5K2L9', 'alicinha', '*7148BF452EC6C2AC332B6952265E9768D42FAA0D', '2020-04-22 20:48:48', '2020-04-30 17:18:46'),
	('db5a0d6f-8822-11ea-a182-a880882a3ba8', 'Jubileu', 'Jubilado', '10 rue Verdun', 'Montreal', 'Quebec', 'J8H2K9', 'jubijubi', '*97E7471D816A37E38510728AEA47440F9C6E2585', '2020-04-26 22:03:07', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Copiando estrutura para procedure project2_renan.customers_delete
DELIMITER //
CREATE PROCEDURE `customers_delete`(
	IN `p_customeruuid` CHAR(36)
)
    MODIFIES SQL DATA
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN
	DELETE 
	FROM customers
	WHERE customeruuid = p_customeruuid;
END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.customers_insert
DELIMITER //
CREATE PROCEDURE `customers_insert`(
	IN `p_firstname` VARCHAR(20),
	IN `p_lastname` VARCHAR(20),
	IN `p_address` VARCHAR(25),
	IN `p_city` VARCHAR(25),
	IN `p_province` VARCHAR(25),
	IN `p_postalcode` VARCHAR(7),
	IN `p_username` VARCHAR(12),
	IN `p_password` VARCHAR(255)
)
    COMMENT 'Made by Renan Barros. Version 1. UUID() Implemented directly on the insert because did not work on default mode.'
BEGIN
	INSERT INTO customers
	VALUES (
				UUID(),
				p_firstname,
				p_lastname,
				p_address,
				p_city,
				p_province, 
				p_postalcode,
				p_username,
				p_password,
				CURRENT_TIMESTAMP(),
				NULL
				);

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.customers_select
DELIMITER //
CREATE PROCEDURE `customers_select`()
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN

	SELECT *
	FROM customers;

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.customers_update
DELIMITER //
CREATE PROCEDURE `customers_update`(
	IN `p_customeruuid` CHAR(36),
	IN `p_firstname` VARCHAR(20),
	IN `p_lastname` VARCHAR(20),
	IN `p_address` VARCHAR(25),
	IN `p_city` VARCHAR(25),
	IN `p_province` VARCHAR(25),
	IN `p_postalcode` VARCHAR(7),
	IN `p_username` VARCHAR(12),
	IN `p_password` VARCHAR(255)
)
    MODIFIES SQL DATA
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN
	
	UPDATE customers
	SET	firstname = p_firstname,
			lastname = p_lastname,
			address = p_address,
			city = p_city,
			province = p_province,
			postalcode = p_postalcode,
			username = p_username,
			passwordenc = p_password,
			modifydatetime = CURRENT_TIMESTAMP()
			
	WHERE customeruuid = p_customeruuid;

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.getPassword
DELIMITER //
CREATE PROCEDURE `getPassword`(
	IN `p_username` VARCHAR(12)
)
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN
	
	SELECT passwordenc
	FROM customers
	WHERE username = p_username;
		

END//
DELIMITER ;

-- Copiando estrutura para tabela project2_renan.products
CREATE TABLE IF NOT EXISTS `products` (
  `productuuid` char(36) NOT NULL,
  `prodcode` varchar(12) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `cost` decimal(7,2) NOT NULL DEFAULT '0.00',
  `createdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifydatetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`productuuid`),
  KEY `prodcode` (`prodcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela project2_renan.products: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`productuuid`, `prodcode`, `description`, `price`, `cost`, `createdatetime`, `modifydatetime`) VALUES
	('069b1199-84fc-11ea-8aea-8cd174d2c150', 'Software20', 'Modified', 199.99, 109.29, '2020-04-22 21:47:36', '2020-04-22 21:56:09'),
	('9e994b2a-84fa-11ea-8aea-8cd174d2c150', 'Computer24', 'Any Computer', 1099.99, 600.99, '2020-04-22 21:37:32', NULL),
	('9ea027b4-84fa-11ea-8aea-8cd174d2c150', 'Laptop23', 'Any Laptop', 2099.99, 1690.99, '2020-04-22 21:37:32', NULL),
	('9eab1ac8-84fa-11ea-8aea-8cd174d2c150', 'MotherB23', 'Any Mother Board', 409.99, 280.99, '2020-04-22 21:37:32', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Copiando estrutura para procedure project2_renan.products_delete
DELIMITER //
CREATE PROCEDURE `products_delete`(
	IN `p_productuuid` CHAR(36)
)
    MODIFIES SQL DATA
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN

	DELETE 
	FROM products
	WHERE productuuid=p_productuuid;

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.products_insert
DELIMITER //
CREATE PROCEDURE `products_insert`(
	IN `p_code` VARCHAR(12),
	IN `p_description` VARCHAR(100),
	IN `p_price` DECIMAL(7,2),
	IN `p_cost` DECIMAL(7,2)
)
    MODIFIES SQL DATA
    COMMENT 'Made by Renan Barros. Version 1. UUID() Implemented directly on the insert because did not work on default mode.'
BEGIN
	INSERT
	INTO products
	VALUES(
			UUID(),
			p_code,
			p_description,
			p_price,
			p_cost,
			CURRENT_TIMESTAMP(),
			NULL
			);

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.products_select
DELIMITER //
CREATE PROCEDURE `products_select`()
    READS SQL DATA
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN

	SELECT *
	FROM products;

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.products_update
DELIMITER //
CREATE PROCEDURE `products_update`(
	IN `p_productuuid` CHAR(36),
	IN `p_prodcode` VARCHAR(12),
	IN `p_description` VARCHAR(100),
	IN `p_price` DECIMAL(7,2),
	IN `p_cost` DECIMAL(7,2)
)
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN
	UPDATE products
	SET prodcode = p_prodcode,
		 description = p_description,
		 price = p_price,
		 cost = p_cost,
		 modifydatetime = CURRENT_TIMESTAMP()
	WHERE productuuid = p_productuuid;

END//
DELIMITER ;

-- Copiando estrutura para view project2_renan.products_view
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `products_view` (
	`productuuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`prodcode` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`description` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`price` DECIMAL(7,2) NOT NULL,
	`cost` DECIMAL(7,2) NOT NULL
) ENGINE=MyISAM;

-- Copiando estrutura para tabela project2_renan.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchaseuuid` char(36) NOT NULL,
  `customeruuid_fk` char(36) DEFAULT NULL,
  `productuuid_fk` char(36) NOT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT '0',
  `price` decimal(7,2) NOT NULL,
  `subtotal` decimal(7,2) NOT NULL,
  `taxes` decimal(7,2) NOT NULL,
  `grandtotal` decimal(7,2) NOT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `createdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifydatetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`purchaseuuid`),
  KEY `FK_purchases_customers` (`customeruuid_fk`) USING BTREE,
  KEY `FK_purchases_products` (`productuuid_fk`),
  CONSTRAINT `FK_purchases_customers` FOREIGN KEY (`customeruuid_fk`) REFERENCES `customers` (`customeruuid`),
  CONSTRAINT `FK_purchases_products` FOREIGN KEY (`productuuid_fk`) REFERENCES `products` (`productuuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela project2_renan.purchases: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` (`purchaseuuid`, `customeruuid_fk`, `productuuid_fk`, `quantity`, `price`, `subtotal`, `taxes`, `grandtotal`, `comments`, `createdatetime`, `modifydatetime`) VALUES
	('1017b811-8b20-11ea-8538-e9d3647b3dbd', 'cf7cb810-84f3-11ea-8aea-8cd174d2c150', '069b1199-84fc-11ea-8aea-8cd174d2c150', 2, 199.99, 399.98, 60.80, 460.78, 'He will pay next month', '2020-04-30 17:20:41', NULL),
	('1e6f5b02-8b28-11ea-8538-e9d3647b3dbd', '44e25855-8b27-11ea-8538-e9d3647b3dbd', '9ea027b4-84fa-11ea-8aea-8cd174d2c150', 2, 2099.99, 4199.98, 638.40, 4838.38, 'He will pay next month', '2020-04-30 18:18:21', NULL),
	('56301ad3-8b27-11ea-8538-e9d3647b3dbd', 'cf70c836-84f3-11ea-8aea-8cd174d2c150', '9e994b2a-84fa-11ea-8aea-8cd174d2c150', 5, 1099.99, 5499.95, 835.99, 6335.94, 'He will pay next month', '2020-04-30 18:12:45', NULL),
	('6720abf9-8b27-11ea-8538-e9d3647b3dbd', '44e25855-8b27-11ea-8538-e9d3647b3dbd', '9e994b2a-84fa-11ea-8aea-8cd174d2c150', 1, 1099.99, 1099.99, 167.20, 1267.19, '10 % rebate', '2020-04-30 18:13:13', NULL),
	('6ae27105-8a97-11ea-99f4-494680b2fbd3', 'c7f2d2a1-87ed-11ea-a182-a880882a3ba8', '9eab1ac8-84fa-11ea-8aea-8cd174d2c150', 2, 409.99, 819.98, 124.64, 944.62, '10 % rebate', '2020-04-30 01:02:32', NULL),
	('98577b3f-8a7f-11ea-99f4-494680b2fbd3', 'cf68bab9-84f3-11ea-8aea-8cd174d2c150', '9ea027b4-84fa-11ea-8aea-8cd174d2c150', 1, 2099.99, 2099.99, 319.20, 2419.19, 'He will pay next month', '2020-04-29 22:12:00', NULL),
	('e93f44ef-8b1c-11ea-8538-e9d3647b3dbd', '04d09843-8b1c-11ea-8538-e9d3647b3dbd', '9e994b2a-84fa-11ea-8aea-8cd174d2c150', 4, 1099.99, 4399.96, 668.79, 5068.75, 'Ship by Post Canada', '2020-04-30 16:58:07', NULL),
	('eb21e23c-8501-11ea-8aea-8cd174d2c150', 'cf7cb810-84f3-11ea-8aea-8cd174d2c150', '9e994b2a-84fa-11ea-8aea-8cd174d2c150', 9, 100.19, 0.00, 0.00, 0.00, 'paid', '2020-04-22 22:29:50', NULL),
	('ef775f20-8b1c-11ea-8538-e9d3647b3dbd', '04d09843-8b1c-11ea-8538-e9d3647b3dbd', '9eab1ac8-84fa-11ea-8aea-8cd174d2c150', 2, 409.99, 819.98, 124.64, 944.62, 'He will pay next month', '2020-04-30 16:58:18', NULL);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

-- Copiando estrutura para procedure project2_renan.purchases_delete
DELIMITER //
CREATE PROCEDURE `purchases_delete`(
	IN `p_purchaseuuid` CHAR(36)
)
    MODIFIES SQL DATA
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN

	DELETE
	FROM purchases
	WHERE purchaseuuid = p_purchaseuuid;

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.purchases_filter
DELIMITER //
CREATE PROCEDURE `purchases_filter`(
	IN `p_customeruuid` CHAR(36),
	IN `p_createdatetime` DATETIME
)
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN
	SELECT *
	FROM purchases
	WHERE createdatetime >= p_createdatetime
	AND customeruuid_fk = p_customeruuid;

END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.purchases_insert
DELIMITER //
CREATE PROCEDURE `purchases_insert`(
	IN `p_customeruuid` CHAR(36),
	IN `p_productuuid` CHAR(36),
	IN `p_quantity` SMALLINT,
	IN `p_price` DECIMAL(7,2),
	IN `p_subtotal` DECIMAL(7,2),
	IN `p_taxes` DECIMAL(7,2),
	IN `p_grandtotal` DECIMAL(7,2),
	IN `p_comments` VARCHAR(200)
)
    COMMENT 'Made by Renan Barros. Version 1. UUID() Implemented directly on the insert because did not work on default mode.'
BEGIN
	INSERT
	INTO purchases
	VALUES(
			UUID(),
			p_customeruuid,
			p_productuuid,
			p_quantity,
			p_price,
			p_subtotal,
			p_taxes,
			p_grandtotal,
			p_comments,
			CURRENT_TIMESTAMP(),
			NULL
			);
		
END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.purchases_select
DELIMITER //
CREATE PROCEDURE `purchases_select`()
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN

	SELECT *
	FROM purchases;
	
END//
DELIMITER ;

-- Copiando estrutura para procedure project2_renan.purchases_update
DELIMITER //
CREATE PROCEDURE `purchases_update`(
	IN `p_purchaseuuid` CHAR(36),
	IN `p_quantity` SMALLINT,
	IN `p_price` DECIMAL(7,2),
	IN `p_comments` VARCHAR(200)
)
    MODIFIES SQL DATA
    COMMENT 'Made by Renan Barros. Version 1. '
BEGIN
	
	UPDATE purchases
	SET	quantity = p_quantity,
			price = p_price,
			comments = p_comments,
			modifydatetime = CURRENT_TIMESTAMP()
	WHERE purchaseuuid = p_purchaseuuid;
	
END//
DELIMITER ;

-- Copiando estrutura para view project2_renan.products_view
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `products_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `products_view` AS SELECT *
FROM products
ORDER BY prodcode ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
