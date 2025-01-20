/*

CREATE TABLE comissoes (
id_comissao INT AUTO_INCREMENT PRIMARY KEY,
valor_comissao INT,
dt_venda DATE,
carro_id INT,
usuario_id INT,
status varchar(50),
FOREIGN KEY (carro_id) REFERENCES carros(id_carro),
FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuarios)
);

*/