
CREATE TABLE estado(
    id int PRIMARY KEY AUTO_INCREMENT,
    uf VARCHAR(20)
);



CREATE TABLE endereco
(
    id int PRIMARY KEY AUTO_INCREMENT,
    estado_id int,
    cep VARCHAR(20),
    endereco  VARCHAR(100),
    numero VARCHAR(100),    
    FOREIGN KEY (estado_id) REFERENCES estado (id)
     ON DELETE CASCADE
 
);

CREATE TABLE pessoa(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    endereco varchar(255),
    cidade varchar(255),
    cpf varchar(255),
    rg varchar(255),
    endereco_id INT,

    data_nascimento DATE,
    data_cadastro DATETIME,
    data_atualizacao DATETIME,
    data_exclusao DATETIME,
    FOREIGN KEY (endereco_id) REFERENCES endereco (id)
     ON DELETE CASCADE
);


CREATE TABLE telefone
(
    id int PRIMARY KEY AUTO_INCREMENT,
    pessoa_id integer, 
    telefone varchar(255),
    FOREIGN KEY (pessoa_id) REFERENCES pessoa (id)
     ON DELETE CASCADE
);




