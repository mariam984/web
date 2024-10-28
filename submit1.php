<?php
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario es diferente
$password = ""; // Cambia esto si tu contraseña es diferente
$dbname = "cafeteria"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO reservaciones (nombre, email, telefono, fecha, hora, personas, comentario) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssii", $nombre, $email, $telefono, $fecha, $hora, $personas, $comentario);

// Obtener valores del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$personas = $_POST['personas'];
$comentario = $_POST['comentario'];

// Ejecutar la declaración
if ($stmt->execute()) {
    // Redirigir de nuevo al formulario después de enviar
    header("Location: reservaciones.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
