CREATE DATABASE IF NOT EXISTS cvgeneratordb;
USE cvgeneratordb;

CREATE TABLE cvs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido1 VARCHAR(100) NOT NULL,
    apellido2 VARCHAR(100) NOT NULL,
    edad INT,
    ciudad VARCHAR(100),
    experiencia TEXT,
    formacion TEXT,
    habilidades TEXT,
    idiomas TEXT, -- Languages separated by commas
    foto VARCHAR(255),
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
);