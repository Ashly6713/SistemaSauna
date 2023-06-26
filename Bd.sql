CREATE DATABASE sistema_pasteleria;

USE sistema_pasteleria;

CREATE TABLE usuario (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom_usuario VARCHAR(50) NOT NULL,
  nombres VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  contrasena VARCHAR(100) NOT NULL,
  Rol BOOLEAN NOT NULL,
  Estado BOOLEAN NOT NULL
);
-- Rol 1 = Administrador
-- Rol 0 = Empleado

CREATE TABLE categoria (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  estado BOOLEAN NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE producto(
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  precio DECIMAL(10, 2) NOT NULL,
  disponibilidad BOOLEAN NOT NULL,
  estado BOOLEAN NOT NULL,
  categoria_id INT NOT NULL,
  FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

CREATE TABLE cliente (
  id INT NOT NULL AUTO_INCREMENT,
  ci INT NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  estado BOOLEAN NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE venta (
  id INT NOT NULL AUTO_INCREMENT,
  fecha_compra DATE NOT NULL,
  total DECIMAL(10, 2) NOT NULL,
  cliente_id INT NOT NULL,
  usuario_id INT NOT NULL,
  tipo INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (cliente_id) REFERENCES Cliente(id),
  FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);
-- tipo 1 = Venta en el lugar
-- tipo 0 = Venta por pedido
CREATE TABLE detalle_venta (
  id INT NOT NULL AUTO_INCREMENT,
  precio DECIMAL(10, 2) NOT NULL,
  cantidad INT NOT NULL,
  sub_total DECIMAL(10, 2) NOT NULL,
  producto_id INT NOT NULL,
  reserva_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (reserva_id) REFERENCES venta(id),
  FOREIGN KEY (producto_id) REFERENCES producto(id)
);
CREATE TABLE detalle (
  id INT NOT NULL AUTO_INCREMENT,
  precio DECIMAL(10, 2) NOT NULL,
  cantidad INT NOT NULL,
  sub_total DECIMAL(10, 2) NOT NULL,
  cliente_id INT NOT NULL,
  producto_id INT NOT NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (cliente_id) REFERENCES cliente(id),
  FOREIGN KEY (producto_id) REFERENCES producto(id),
  FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);


CREATE TABLE configuracion (
  id INT PRIMARY KEY,
  ruc VARCHAR(11),
  nombre VARCHAR(100),
  telefono VARCHAR(20),
  direccion VARCHAR(200),
  mensaje VARCHAR(255)
);
