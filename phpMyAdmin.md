//Para colocar en el localhost de php, en el aparatado de MySQL
//Creamos tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    tipo ENUM('Ciudadano', 'Administrador') NOT NULL DEFAULT 'Ciudadano',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




//Para crear tabla de reportes para usuarios en el mismo apartado

CREATE TABLE reportes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    descripcion TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foto VARCHAR(255),
    categoria ENUM('Basura', 'Alumbrado', 'Calles_Dañadas', 'Mobiliario', 'Otros') NOT NULL,
    estado ENUM('Pendiente', 'En_Proceso', 'Resuelto') DEFAULT 'Pendiente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

//Q hace esta tabla?
//°Almacena los reportes con descripcion, foto, categoria y estado
//°Cada reporte está ligado a un usuario (usuario_id)
//°El estado comienza en "Pendiente" por defecto
