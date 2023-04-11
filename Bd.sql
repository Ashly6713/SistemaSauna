CREATE DATABASE sistema_reservas;

-- Seleccionar la base de datos
USE sistema_reservas;

CREATE TABLE Rol (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL
);

CREATE TABLE Usuario (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  contrasena VARCHAR(100) NOT NULL,
  rol_id INT,
  FOREIGN KEY (rol_id) REFERENCES Rol(id)
);

CREATE TABLE Permiso (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  rol_id INT,
  FOREIGN KEY (rol_id) REFERENCES Rol(id)
);

CREATE TABLE Categoria_cuarto (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Cuarto (
  id INT PRIMARY KEY AUTO_INCREMENT,
  numero INT NOT NULL,
  precio_hora DECIMAL(10, 2) NOT NULL,
  disponibilidad BOOLEAN NOT NULL,
  estado BOOLEAN NOT NULL,
  categoria_id INT NOT NULL,
  FOREIGN KEY (categoria_id) REFERENCES Categoria_cuarto(id)
);



CREATE TABLE Cliente (
  ci INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL UNIQUE,
  telefono VARCHAR(20) NOT NULL,
  PRIMARY KEY (ci)
);

CREATE TABLE Reserva (
  id INT NOT NULL AUTO_INCREMENT,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  cliente_id INT NOT NULL,
  cuarto_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (cliente_id) REFERENCES Cliente(ci),
  FOREIGN KEY (cuarto_id) REFERENCES Cuarto(id)
);

CREATE TABLE Ticket_reserva (
  id INT NOT NULL AUTO_INCREMENT,
  precio DECIMAL(10, 2) NOT NULL,
  fecha_compra DATETIME NOT NULL,
  reserva_id INT NOT NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (reserva_id) REFERENCES Reserva(id),
  FOREIGN KEY (usuario_id) REFERENCES Usuario(id)
);