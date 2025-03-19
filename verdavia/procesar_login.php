<?php
session_start(); // Iniciar sesión

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "verdavia");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

// Consultar el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    
    // Verificar la contraseña
    if (password_verify($contraseña, $usuario['contraseña'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['usuario_tipo'] = $usuario['tipo']; // Para diferenciar "Ciudadano" y "Administrador"
        
        header("Location: inicio.php");
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "El correo no está registrado.";
}

// Cerrar conexión
$conexion->close();
?>
