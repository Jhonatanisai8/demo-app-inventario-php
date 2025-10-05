use db_inventario_php;
-- mostramos las bases de datos
show tables;

-- creacion de tablas
CREATE TABLE usuario (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_nombre VARCHAR(50) NOT NULL,
    usuario_apellidos VARCHAR(50) NOT NULL,
    usuario_usuario VARCHAR(20) NOT NULL,
    usuario_clave VARCHAR(200) NOT NULL,
    usuario_email VARCHAR(100) NOT NULL
);

create table categoria(
categoria_id int primary key auto_increment,
categoria_nombre varchar(50) not null,
categeria_ubicacion varchar(50) not null
);

CREATE TABLE producto (
    producto_id INT PRIMARY KEY AUTO_INCREMENT,
    producto_codigo VARCHAR(70) NOT NULL,
    producto_nombre VARCHAR(70) NOT NULL,
    producto_precio DECIMAL(30 , 2 ) NOT NULL,
    producto_stock INT NOT NULL,
    producto_foto VARCHAR(500) NOT NULL
);


ALTER TABLE producto ADD categoria_id INT;
ALTER TABLE producto ADD usuario_id INT;

-- laves foraneas
ALTER TABLE producto
ADD FOREIGN KEY (categoria_id) REFERENCES categoria(categoria_id);
ALTER TABLE producto
ADD FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id);


