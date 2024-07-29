-- Crear la base de datos
CREATE DATABASE agencia_hotelera;

-- Seleccionar la base de datos
USE agencia_hotelera;

-- Crear la tabla VUELO
CREATE TABLE VUELO (
    id_vuelo INT AUTO_INCREMENT PRIMARY KEY,
    origen VARCHAR(100),
    destino VARCHAR(100),
    fecha DATE,
    plazas_disponibles INT,
    precio DECIMAL(10, 2)
);

-- Crear la tabla HOTEL
CREATE TABLE HOTEL (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    ubicación VARCHAR(100),
    habitaciones_disponibles INT,
    tarifa_noche DECIMAL(10, 2)
);

-- Crear la tabla RESERVA
CREATE TABLE RESERVA (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    fecha_reserva DATE,
    id_vuelo INT,
    id_hotel INT,
    FOREIGN KEY (id_vuelo) REFERENCES VUELO(id_vuelo),
    FOREIGN KEY (id_hotel) REFERENCES HOTEL(id_hotel)
);
