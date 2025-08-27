CREATE TABLE categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO categorias (nome) VALUES
('Eletrônicos'),
('Alimentos'),
('Roupas'),
('Livros'),
('Brinquedos');

CREATE TABLE distribuidores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO distribuidores (nome) VALUES
('FMX Brasil'),
('Revenda Eletro'),
('Meqso'),
('AJ Atacado'),
('Atacado Diniz'),
('Tozzo Alimentos'),
('Fröhlich'),
('Ciranda de Livros'),
('Panpan Fashion'),
('Modas Cerezo Cadena'),
('LV Modas'),
('TH Toys'),
('Center Toys Distribuidora'),
('Atacado Ideal'),
('Sein Brinquedos Educativos');

CREATE TABLE produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    descricao TEXT,
    quantidade_estoque INT NOT NULL,
    id_categoria INT NOT NULL,
    id_distribuidor INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id),
    FOREIGN KEY (id_distribuidor) REFERENCES distribuidores(id)
);