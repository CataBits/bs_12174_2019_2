-- Banco de Dados da Aplicação "Sem Nome"
-- Apague este arquivo quando a modelagem estiver concluída!

-- CUIDADO! ALTAMENTE DESTRUTIVO
-- Apagar o banco caso exista 
DROP DATABASE IF EXISTS semnome;  
 
-- Criar o banco de Dados em UTF-8 e case-insensitive
CREATE DATABASE semnome CHARACTER SET utf8 COLLATE utf8_general_ci;  

-- Seleciona o banco de dados
USE semnome;

-- Cria tabela "contatos"
CREATE TABLE contatos (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- "AAAA-MM-DD hh:mm:ss"
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    assunto VARCHAR(255) NOT NULL,
    mensagem TEXT,
    campo1 TEXT COMMENT 'Para uso futuro',
    campo2 TEXT COMMENT 'Para uso futuro',
    status ENUM('recebido', 'lido', 'respondido', 'apagado') DEFAULT 'recebido'
);

-- Criar a tabela "autores"
CREATE TABLE autores (
    id_autor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    imagem VARCHAR(255),
    nome VARCHAR(255),
    nascimento VARCHAR(255),
    descricao VARCHAR(255),
    email VARCHAR(255),
    site VARCHAR(255),
    ver_idade ENUM('0', '1') DEFAULT '1' COMMENT '0 - oculta idade',
    ver_email ENUM('0', '1') DEFAULT '1' COMMENT '0 - oculta e-mail',
    ver_site ENUM('0', '1') DEFAULT '1' COMMENT '0 - oculta site',
    campo1 TEXT COMMENT 'Para uso futuro',
    campo2 TEXT COMMENT 'Para uso futuro',
    campo3 TEXT COMMENT 'Para uso futuro',
    campo4 TEXT COMMENT 'Para uso futuro',
    status ENUM('ativo', 'inativo') DEFAULT 'ativo'
); 

-- Criar tabela "artigos"
CREATE TABLE artigos (
    id_artigos INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    autor_id INT NOT NULL,
    thumbnail VARCHAR(255) COMMENT 'Imagem que representa o artigo',
    titulo VARCHAR(255),
    resumo VARCHAR(255),
    conteudo LONGTEXT,
    visualizacoes INT,
    campo1 TEXT COMMENT 'Para uso futuro',
    campo2 TEXT COMMENT 'Para uso futuro',
    campo3 TEXT COMMENT 'Para uso futuro',
    status ENUM('ativo', 'inativo') DEFAULT 'ativo',
    FOREIGN KEY (autor_id) REFERENCES autores (id_autor)
);