CREATE DATABASE AGENCIA;

USE AGENCIA;

CREATE TABLE VUELO (
    id_vuelo INT AUTO_INCREMENT PRIMARY KEY,
    origen VARCHAR(50),
    destino VARCHAR(50),
    fecha DATE,
    plazas_disponibles INT,
    precio DECIMAL(10, 2)
);

CREATE TABLE HOTEL (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    ubicación VARCHAR(50),
    habitaciones_disponibles INT,
    tarifa_noche DECIMAL(10, 2)
);

CREATE TABLE RESERVA (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    fecha_reserva DATE,
    id_vuelo INT,
    id_hotel INT,
    FOREIGN KEY (id_vuelo) REFERENCES VUELO(id_vuelo),
    FOREIGN KEY (id_hotel) REFERENCES HOTEL(id_hotel)
);
