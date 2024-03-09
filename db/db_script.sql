
-- Script para crear la base de datos y las tablas del sistema de gestión de tareas

/* 
  1. Crear la base de datos zapatos3000:

  La primera línea del script crea una base de datos llamada 'zapatos3000'. 
  Esta base de datos almacenará la información de los usuarios y sus tareas.
*/
CREATE DATABASE zapatos3000;

/* 
  2. Seleccionar la base de datos zapatos3000:

  La segunda línea del script selecciona la base de datos 'zapatos3000' para que las tablas subsecuentes se creen dentro de esta base de datos.
*/
USE zapatos3000;

/* 
  3. Crear la tabla usuarios:

  La tercera línea del script crea una tabla llamada 'usuarios'. Esta tabla almacena la información de los usuarios del sistema, incluyendo:

    - id: Identificador único del usuario (INT, Auto-incrementable, Clave Primaria)
    - nombre: Nombre del usuario (VARCHAR(50), NOT NULL)
    - apellido: Apellido del usuario (VARCHAR(50), NOT NULL)
    - correo: Correo electrónico del usuario (VARCHAR(100), NOT NULL)
    - contrasena: Contraseña del usuario (VARCHAR(255), NOT NULL)

  Las columnas 'nombre', 'apellido', 'correo' y 'contrasena' se marcan como NOT NULL para garantizar que siempre tengan un valor.
*/
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  contrasena VARCHAR(255) NOT NULL
);

/* 
  4. Crear la tabla tareas:

  La cuarta línea del script crea una tabla llamada 'tareas'. Esta tabla almacena la información de las tareas creadas por los usuarios, incluyendo:

    - id: Identificador único de la tarea (INT, Auto-incrementable, Clave Primaria)
    - usuario_id: Identificador del usuario que creó la tarea (INT, Clave Foránea)
    - tarea_descripcion: Descripción de la tarea (TEXT)
    - fecha_creacion: Fecha y hora de creación de la tarea (TIMESTAMP, Valor por defecto: CURRENT_TIMESTAMP)

  La columna 'usuario_id' se declara como Clave Foránea que referencia la columna 'id' de la tabla 'usuarios'. Esto permite relacionar las tareas con los usuarios que las crearon.
  La columna 'fecha_creacion' se establece con un valor por defecto de CURRENT_TIMESTAMP, lo que significa que se guardará la fecha y hora actual del sistema cada vez que se cree una nueva tarea.
*/
CREATE TABLE tareas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  tarea_descripcion TEXT,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
