CREATE DATABASE ShirtEcommerce ;
USE SHirtEcommerce;

CREATE TABLE usuarios (
id         int(255) auto_increment not null,
nombre     varchar(255) not null,
apellidos  varchar(255),
email      varchar(255) not null,
password   varchar(255) not null,
rol        varchar(50),
imagen     varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null,'Robert','Martinez Rivera','robert.laksee20@gmail.com','contraseña20','admin',null);
INSERT INTO usuarios VALUES(null,'David','Martinez Rivera','david-3111@gmail.com','contraseña31','admin',null);


CREATE TABLE categorias (
id         int(255) auto_increment not null,
nombre     varchar(255) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(null, 'Manga-corta');
INSERT INTO categorias VALUES(null, 'Manga-larga');
INSERT INTO categorias VALUES(null, 'Tirantes');
INSERT INTO categorias VALUES(null, 'Sudaderas');


CREATE TABLE productos (
id         int(255) auto_increment not null,
nombre     varchar(255) not null,
descripcion text,
precio      float(100,2) not null,
categoria_id int(255) not null,
stock       int(255) not null,
oferta      varchar(10),
fecha       date not null,
imagen      varchar(255), 
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE pedidos (
id         int(255) auto_increment not null,
usuario_id int(255) not null,
provincia  varchar(100) not null,
localidad  varchar(100) not null,
direccion  varchar(100) not null,
coste      float(200,2) not null,
estado     varchar(20) not null,
fecha      date not null,
hora       time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

/*Esta tabla es un punto de conexion entre un pedido y los productos que contiene.....
Constituye una relacion de muchos a muchos entre pedidos y productos*/

CREATE TABLE lineas_peidos (
id         int(255) auto_increment not null,
pedido_id  int(255) not null,
producto_id int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_lineas_pedidos_producto FOREIGN KEY(producto_id) REFERENCES productos(id),
CONSTRAINT fk_lineas_pedidos_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id) 
)ENGINE=InnoDb;
