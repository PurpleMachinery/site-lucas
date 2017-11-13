DROP DATABASE IF EXISTS musicous;
CREATE DATABASE IF NOT EXISTS musicous;
USE musicous;

CREATE TABLE artistas(
	id_artista INT UNIQUE NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome NVARCHAR(50) NOT NULL
);

CREATE TABLE albuns(
	id_album INT UNIQUE NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome NVARCHAR(50) NOT NULL,
    fk_artista INT NOT NULL REFERENCES artistas(id_artista)
);

CREATE TABLE musicas(
	id_musica INT UNIQUE NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome NVARCHAR(100) NOT NULL,
    fk_album INT DEFAULT '0' REFERENCES albuns(id_album)
);

INSERT INTO artistas (nome) VALUES 
('HELLYEAH'),
('X Ambassadors'),
('O Rappa'),
('Sabaton'),
('Beartooth');

INSERT INTO albuns (fk_artista, nome) VALUES
(1,'Blood For Blood'),
(2,'VHS'),
(3,'Lado B Lado A'),
(4,'Heroes'),
(5,'Agressive');

INSERT INTO musicas (fk_album, nome) VALUES
(1,'Moth'),
(2,'Jungle'),
(3,'Me Deixa'),
(3,'O Que Sobrou do Céu'),
(4,'To Hell and Back'),
(5,'Hated');

/*SELECT musicas.nome AS musica, albuns.nome AS album, artistas.nome AS autor 
FROM musicas JOIN albuns JOIN artistas 
WHERE musicas.fk_album = albuns.id_album AND artistas.id_artista = albuns.fk_artista;*/

SELECT musicas.nome AS musica, artistas.nome AS artista 
FROM musicas JOIN artistas JOIN albuns 
WHERE (musicas.fk_album = albuns.id_album OR musicas.fk_album = 0) AND artistas.nome LIKE '%a%' AND albuns.fk_artista=artistas.id_artista;