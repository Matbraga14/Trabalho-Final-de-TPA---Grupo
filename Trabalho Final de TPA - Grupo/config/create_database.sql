create database trabalhotpa;

use trabalhotpa;

DROP TABLE IF EXISTS `fornecedor`;

CREATE TABLE IF NOT EXISTS `fornecedor` (
    `id_fornecedor` int PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(30) DEFAULT NULL,
    `telefone` varchar(14) DEFAULT NULL,
    `email` varchar(60) DEFAULT NULL,
    `endereco` varchar(100) DEFAULT NULL
) ENGINE = InnoDB;

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE IF NOT EXISTS `produtos` (
    `id_produto` int PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(30) DEFAULT NULL,
    `descricao` tinytext,
    `preco` decimal(10, 0) DEFAULT NULL,
    `qtd_estoque` int DEFAULT NULL,
    `categoria` varchar(30) DEFAULT NULL,
    `fk_id_fornecedor` int DEFAULT NULL,
    FOREIGN KEY (`fk_id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`)
) ENGINE = InnoDB;

DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
    `idUser` int PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(30) DEFAULT NULL,
    `email` varchar(60) DEFAULT NULL,
    `senha` varchar(20) DEFAULT NULL
) ENGINE = InnoDB;