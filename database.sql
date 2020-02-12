-- Banco de Dados da Aplicação "Sem Nome"
-- CUIDADO! ALTAMENTE DESTRUTIVO
-- Apague este arquivo quando a modelagem estiver concluída!

-- Apagando o banco de dados caso ele já exista 
DROP DATABASE IF EXISTS semnome;  
 
-- Criando o banco de dados em UTF-8 e com buscas case-insensitive
CREATE DATABASE semnome CHARACTER SET utf8 COLLATE utf8_general_ci;  

-- Selecionando o banco de dados
USE semnome;

-- Criando a tabela "contatos"
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

-- Criando a tabela "autores"
CREATE TABLE autores (
    id_autor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data_autor TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    thumb_autor VARCHAR(255) COMMENT 'Uma imagem que representa o autor',
    nome_autor VARCHAR(255) COMMENT 'Nome completo que só aparece nos detalhes',
    nome_tela VARCHAR(127) NOT NULL COMMENT 'Nome curto que aparece no site',
    email VARCHAR(255) NOT NULL,
    site VARCHAR(255) COMMENT 'Sites começam com http://',
    curriculo TEXT COMMENT 'Um mini-currículo do autor.',
    telefone VARCHAR(128),
    nascimento DATE COMMENT 'Formato: AAAA-MM-DD',
    campo1 TEXT COMMENT 'Para uso futuro',
    campo2 TEXT COMMENT 'Para uso futuro',
    campo3 TEXT COMMENT 'Para uso futuro',
    status_autor ENUM('inativo', 'ativo') DEFAULT 'ativo'
);

-- Criando a tabela "categorias"
CREATE TABLE categorias (
    id_categoria INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    categoria VARCHAR(63) NOT NULL,
    campo1 TEXT COMMENT 'Para uso futuro'
);

-- Criando a tabela "artigos"
CREATE TABLE artigos (
    id_artigo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data_artigo TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Pode ser uma data no futuro',
    thumb_artigo VARCHAR(255) COMMENT 'Uma imagem pequena que representa o artigo',
    titulo VARCHAR(255) NOT NULL,
    resumo VARCHAR(255),
    texto LONGTEXT COMMENT 'Pode usar HTML e CSS',
    autor_id INT NOT NULL COMMENT 'Chave estrangeira',
    campo1 TEXT COMMENT 'Para uso futuro',
    campo2 TEXT COMMENT 'Para uso futuro',
    campo3 TEXT COMMENT 'Para uso futuro',
    status_artigo ENUM('inativo', 'ativo') DEFAULT 'ativo',
    FOREIGN KEY (autor_id) REFERENCES autores (id_autor)
);

-- Criando a tabela "art_cat"
CREATE TABLE art_cat (
    id_art_cat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    artigo_id INT NOT NULL COMMENT 'Chave estrangeira',
    categoria_id INT NOT NULL COMMENT 'Chave estrangeira',
    FOREIGN KEY (artigo_id) REFERENCES artigos (id_artigo),
    FOREIGN KEY (categoria_id) REFERENCES categorias (id_categoria)
);

-- Inserindo dados em "autores"
-- ou
-- Populando a tabela "autores"
INSERT INTO autores
    (
        thumb_autor, nome_autor,
        nome_tela, email,
        site, curriculo,
        telefone, nascimento
    )
VALUES
    (
        'https://picsum.photos/200', 'Joca da Silva',
        'Joca Silva', 'joca@silva.com',
        'http://www.jocasilva.com/', 'Programador desde os 5 anos de idade, quando fez seu primeiro programa para MSX.',
        '(21) 98765-4321', '1980-12-22'
    ),
    (
        'https://picsum.photos/200', 'Dilermano dos Santos Soares',
        'Diler Soares', 'diler@mano.com',
        'http://mano.com/', 'Escrevedor de códigos desde a época do CP-500. Programa desde que sofreu um acidente e ficou de castigo.',
        '(21) 99887-7665', '1974-04-14'
    ),
    (
        'https://picsum.photos/200', 'Marineuza Sirinelson da Costa',
        'Mari Siri', 'mari@neuza.com.br',
        'http://mari.neuza.com.br/', 'Mecânica de computadores, formada pela faculdade de ciências ocultas da curva do vento, comecou na carreira após seu PC ser afogado nas chuvas do Rio de Janeiro.',
        '(21) 98988-9988', '1999-09-09'
    )
;

-- Populando a tabela "categorias"
INSERT INTO categorias (categoria) VALUES
('Categoria 1'), 
('Categoria 2'),
('Categoria 3'),
('Categoria 4'),
('Categoria 5'),
('Categoria 6'),
('Categoria 7'),
('Categoria 8');

-- Populando a tabela "artigos"
INSERT INTO artigos (
    data_artigo,
    thumb_artigo,
    titulo,
    resumo,
    texto,
    autor_id
) VALUES 
(
    '2020-02-03 11:44:00',
    'https://picsum.photos/201',
    'Primeiro artigo do meu site',
    'Veja como vai aparecer no site o artigo do meu site.',
    '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas hendrerit elit nec est varius tristique.</p><p>Nunc ante tortor, facilisis vel diam lobortis, consequat aliquam lorem.</p><p>Fusce dolor orci, fringilla eget mauris ac, lobortis imperdiet odio. </p>',
    '1'
),
(
    '2020-02-05 08:12:27',
    'https://picsum.photos/202',
    'Segundo artigo do meu site',
    'Veja como vai aparecer no site, mais este artigo do meu site.',
    '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas hendrerit elit nec est varius tristique.</p><p>Nunc ante tortor, facilisis vel diam lobortis, consequat aliquam lorem.</p><p>Fusce dolor orci, fringilla eget mauris ac, lobortis imperdiet odio. </p>',
    '3'
),
(
    '2020-02-05 14:30:00',
    'https://picsum.photos/199',
    'Terceiro artigo publicado',
    'Mais um artigo, mais um conteúdo. Veja como esse ficará melhor.',
    '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas hendrerit elit nec est varius tristique.</p><p>Nunc ante tortor, facilisis vel diam lobortis, consequat aliquam lorem.</p><p>Fusce dolor orci, fringilla eget mauris ac, lobortis imperdiet odio. </p>',
    '2'
),
(
    '2020-02-05 14:31:00',
    'https://picsum.photos/198',
    'Artigo agendado para um futuro próximo.',
    'Como será que o PHP vai saber que este artigo é agendado para o futuro?',
    '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas hendrerit elit nec est varius tristique.</p><p>Nunc ante tortor, facilisis vel diam lobortis, consequat aliquam lorem.</p><p>Fusce dolor orci, fringilla eget mauris ac, lobortis imperdiet odio. </p>',
    '1'
),
(
    '2020-02-11 18:25:00',
    'https://picsum.photos/200',
    'Artigo mais novo que os outros.',
    'Este artigo é muito novo e você pode consultá-lo.',
    '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas hendrerit elit nec est varius tristique.</p><p>Nunc ante tortor, facilisis vel diam lobortis, consequat aliquam lorem.</p><p>Fusce dolor orci, fringilla eget mauris ac, lobortis imperdiet odio. </p>',
    '3'
);

-- Populando a tabela "art_cat"
INSERT INTO art_cat
    (artigo_id, categoria_id)
VALUES
    (1, 1),
    (1, 2),
    (1, 6),
    (2, 1),
    (2, 7),
    (2, 8),
    (3, 4),
    (3, 5),
    (3, 7),
    (4, 1),
    (4, 8),
    (5, 3)
;
