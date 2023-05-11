CREATE DATABASE sistema_reservas;

USE sistema_reservas;

CREATE TABLE Usuario (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom_usuario VARCHAR(50) NOT NULL,
  nombres VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  contrasena VARCHAR(100) NOT NULL,
  Rol BOOLEAN NOT NULL
);
-- Rol 1 = Administrador
-- Rol 0 = Empleado

CREATE TABLE Categoria_cuarto (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  codigo VARCHAR(10) NOT NULL,
  precio_hora DECIMAL(10, 2) NOT NULL,
  estado BOOLEAN NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Cuarto (
  id INT PRIMARY KEY AUTO_INCREMENT,
  numero INT NOT NULL,
  disponibilidad BOOLEAN NOT NULL,
  estado BOOLEAN NOT NULL,
  categoria_id INT NOT NULL,
  FOREIGN KEY (categoria_id) REFERENCES Categoria_cuarto(id)
);

CREATE TABLE Cliente (
  ci INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  PRIMARY KEY (ci)
);

CREATE TABLE Reserva (
  id INT NOT NULL AUTO_INCREMENT,
  precio DECIMAL(10, 2) NOT NULL,
  fecha_compra DATETIME NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  cliente_id INT NOT NULL,
  cuarto_id INT NOT NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (cliente_id) REFERENCES Cliente(ci),
  FOREIGN KEY (usuario_id) REFERENCES Usuario(id),
  FOREIGN KEY (cuarto_id) REFERENCES Cuarto(id)
);

--INSERTAR USUARIOS

--INSERT INTO Usuario (nom_usuario,nombres, apellido, correo, contrasena, Rol)
--VALUES ('Admin','Juan', 'Pérez', 'juan.perez@gmail.com', '123', 1);
--INSERT INTO Usuario (nom_usuario,nombres, apellido, correo, contrasena, Rol)
--VALUES ('Emp','Mario', 'Lopez', 'mario.lopez@gmail.com', '456', 0);
