DROP DATABASE IF EXISTS `quickwork`;
CREATE DATABASE `quickwork` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `quickwork`;

CREATE TABLE `cliente` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `usuario` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `ativo` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `categoria` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) DEFAULT NULL
);

CREATE TABLE `prestador` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `especialidade` VARCHAR(255) DEFAULT NULL,
  `disponibilidade` VARCHAR(50) DEFAULT 'indefinido',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `servico` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) DEFAULT NULL,
  `preco` VARCHAR(50) DEFAULT '0.00'
);

CREATE TABLE `pedido` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `items` VARCHAR(255) DEFAULT NULL,
  `status` VARCHAR(50) DEFAULT 'novo',
  `valor` VARCHAR(50) DEFAULT '0.00',
  `datapedido` VARCHAR(50) DEFAULT NULL
);

CREATE TABLE `mensagem` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `remetente` VARCHAR(255) DEFAULT NULL,
  `destinatario` VARCHAR(255) DEFAULT NULL,
  `conteudo` VARCHAR(255) DEFAULT NULL
);

INSERT INTO `cliente` (`nome`, `email`, `usuario`, `senha`, `ativo`)
VALUES ('Administrador', 'admin@local', 'admin', 'admin', 1);
