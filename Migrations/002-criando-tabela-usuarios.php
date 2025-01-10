*/

CREATE TABLE usuarios (
  id_usuarios INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100),
  senha VARCHAR(30),
  tipo_usuario VARCHAR(30),
  comissao INT
);

/*