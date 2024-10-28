<?php
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario es diferente
$password = ""; // Cambia esto si tu contraseña es diferente
$dbname = "comentarios"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO comen (nombre, email, calificacion, comentario) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $nombre, $email, $calificacion, $comentario);

// Obtener valores del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$calificacion = $_POST['calificacion'];
$comentario = $_POST['comentario'];

// Ejecutar la declaración
if ($stmt->execute()) {
    // Redirigir de nuevo al formulario después de enviar
    header("Location: reseñas.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();

echo '<a href="index.html">'
?>