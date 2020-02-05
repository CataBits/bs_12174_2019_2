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

-- Cria tabela "autores"
CREATE TABLE autores (
    id_autor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data_autor TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    thumb_autor VARCHAR(255),
    nome_autor VARCHAR(255),
    nome_tela VARCHAR(127) NOT NULL,
    email VARCHAR(255) NOT NULL,
    site VARCHAR(255),
    curriculo TEXT,
    telefone VARCHAR(128),
    nascimento DATE,
    campo1 TEXT,
    campo2 TEXT,
    campo3 TEXT,
    status ENUM('inativo', 'ativo') DEFAULT 'ativo'
);
