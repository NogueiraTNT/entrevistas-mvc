-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para entrevistas
CREATE DATABASE IF NOT EXISTS `entrevistas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `entrevistas`;

-- Copiando estrutura para tabela entrevistas.candidato
CREATE TABLE IF NOT EXISTS `candidato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `cargo_desejado` varchar(50) DEFAULT NULL,
  `curriculo_path` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela entrevistas.entrevistadores
CREATE TABLE IF NOT EXISTS `entrevistadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `especialidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela entrevistas.entrevistas
CREATE TABLE IF NOT EXISTS `entrevistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidato_id` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `modalidade` varchar(50) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_entrevistas_candidato` (`candidato_id`),
  CONSTRAINT `FK_entrevistas_candidato` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela entrevistas.entrevista_entrevistador
CREATE TABLE IF NOT EXISTS `entrevista_entrevistador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrevista_id` int(11) DEFAULT NULL,
  `entrevistador_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_entrevista_entrevistador_entrevistas` (`entrevista_id`),
  KEY `FK_entrevista_entrevistador_entrevistadores` (`entrevistador_id`),
  CONSTRAINT `FK_entrevista_entrevistador_entrevistadores` FOREIGN KEY (`entrevistador_id`) REFERENCES `entrevistadores` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_entrevista_entrevistador_entrevistas` FOREIGN KEY (`entrevista_id`) REFERENCES `entrevistas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela entrevistas.feedbacks
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrevista_id` int(11) NOT NULL DEFAULT 0,
  `entrevistardor_id` int(11) NOT NULL DEFAULT 0,
  `pontos_positivos` int(11) NOT NULL DEFAULT 0,
  `pontos_negativos` int(11) NOT NULL DEFAULT 0,
  `nota` int(11) NOT NULL DEFAULT 0,
  `recomendado` varchar(50) NOT NULL DEFAULT '0',
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_feedbacks_entrevistas` (`entrevista_id`),
  KEY `FK_feedbacks_entrevistadores` (`entrevistardor_id`),
  CONSTRAINT `FK_feedbacks_entrevistadores` FOREIGN KEY (`entrevistardor_id`) REFERENCES `entrevistadores` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_feedbacks_entrevistas` FOREIGN KEY (`entrevista_id`) REFERENCES `entrevistas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
