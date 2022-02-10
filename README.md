# prova_10


#CRIAR BANCO DE DADOS e TABELAS 



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


#criar o usuário admin e a senha
INSERT INTO `pessoa` (`nome`, `cpf`) VALUES ('admin', '123');



git clone https://github.com/rgpsico/prova_10 

para pasta htdocs (XAMP)

entrar com o login admin e a senha 123 




#Nesse sistema

#criei um sistema de controller  


#criei um sistema de rotas 

   $router->Get('cadastrar', 'HomeController', 'cadastrar');
   $router->post('criarPessoa', 'UserController', 'store');

#criei um sistema de autenticação 
if ($auth->Auth()) {
    $router->Get('cadastrar', 'HomeController', 'cadastrar');
    $router->post('criarPessoa', 'UserController', 'store');

    $router->Get('atualizar', 'UserController', 'atualizar');
    $router->post('update', 'UserController', 'updateUser');
    $router->Get('listar', 'HomeController', 'listar');
}

#criei um Model 
#uma camada de service para serviços externos 
#uma camada de repository para deixar o controle bem limpo 
#criei algumas interfaces para ter um controller dos metodos dos repositories 

#criei um sistema de api 
#um sistema de view 

Usei os padrões da psr-4 

um miniframework 







