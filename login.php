<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Evitar inyección SQL
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);

    // Consulta SQL
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado, iniciar sesión
        $_SESSION['loggedin'] = true;
        echo "Inicio de sesión exitoso. <a href='menu.html'>Ir al menú</a>";
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
$conn->close();
?>

