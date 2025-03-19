<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "verdavia");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encripta la contraseña

// Insertar en la base de datos
$sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
} else {
    echo "Error: " . $conexion->error;
}

// Cerrar conexión
$conexion->close();
?>
