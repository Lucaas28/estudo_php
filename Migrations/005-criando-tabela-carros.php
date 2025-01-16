/*

CREATE TABLE carros (
    id_carro INT AUTO_INCREMENT PRIMARY KEY,
    nome_carro VARCHAR(50) NOT NULL,
    marca_carro VARCHAR(50) NOT NULL,
    observacoes VARCHAR(200),
    valor_compra DECIMAL(10,2) NOT NULL,
    comprador_id INT NOT NULL,
    dt_compra DATE NOT NULL,
    valor_venda DECIMAL(10,2),
    vendedor_id INT,
    dt_venda DATE,
    FOREIGN KEY (comprador_id) REFERENCES usuarios(id_usuarios),
    FOREIGN KEY (vendedor_id) REFERENCES usuarios(id_usuarios)
);

*/