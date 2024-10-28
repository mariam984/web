<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KITTY'CAFE </title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
		<header>
			<div class="container-hero">
				<div class="container hero">
					<div class="customer-support">
						<i class="fa-solid fa-headset"></i>
						<div class="content-customer-support">
							<span class="text">Soporte al cliente</span>
							<span class="number">123-456-7890</span>
						</div>
					</div>

					<div class="container-logo">
						<i class="fa-solid fa-mug-hot"></i>
						<h1 class="logo"><a href="/">KITTY'S CAFE</a></h1>
					</div>

					<div class="container-user">
						<i class="fa-solid fa-user"></i>
						<a href="login.html"> LOGIN </a>
					</div>
				</div>
			</div>

			<div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
					<ul class="menu">
						<a href="inicio.html"> INICIO</a>
						<a href="menu.html"> MENU</a>
						<a href="fotos.html"> FOTOS</a>
						<a href="reseñas.php"> RESEÑAS</a>
					</ul>
				</nav>
			</div>
		</header>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #ffe4ec;
    margin: 0;
    padding: 0;
}

.juana {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fa8fb1;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"],
input[type="time"],
textarea,
select {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

button {
    padding: 10px;
    background-color:#FA7788 ;
    border: none;
    color: #fff;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #f74780;
}

.reservaciones {
    margin-top: 30px;
}

.reservacion {
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 15px;
}

.reservacion h3 {
    margin: 0;
    color: #333;
}

.reservacion p {
    margin: 5px 0;
}

</style>
</head>
<body>
    <div class="juana">
        <h1>Reservar en la Cafetería</h1>
        <form action="submit1.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>

            <label for="personas">Número de Personas:</label>
            <input type="number" id="personas" name="personas" required>

            <label for="comentario">Comentario (opcional):</label>
            <textarea id="comentario" name="comentario" rows="4"></textarea>

            <button type="submit">Reservar</button>
        </form>

        <h2> Ultimas Reservaciones </h2>
        <div class="reservaciones">
            <?php
            // Configuración de la base de datos
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

            // Consultar las reservaciones
            $sql = "SELECT nombre, email, telefono, fecha, hora, personas, comentario, fecha_reserva FROM reservaciones ORDER BY fecha_reserva DESC";
            $result = $conn->query($sql);

            // Mostrar las reservaciones
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $fechaReserva = new DateTime($row['fecha_reserva']);
                    $formattedDate = $fechaReserva->format('d/m/Y H:i:s');

                    echo "<div class='reservacion'>";
                    echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
                    echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
                    echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($row['telefono']) . "</p>";
                    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($row['fecha']) . "</p>";
                    echo "<p><strong>Hora:</strong> " . htmlspecialchars($row['hora']) . "</p>";
                    echo "<p><strong>Número de Personas:</strong> " . htmlspecialchars($row['personas']) . "</p>";
                    echo "<p><strong>Comentario:</strong> " . htmlspecialchars($row['comentario']) . "</p>";
                    echo "<p><em>Fecha de Reserva: " . $formattedDate . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay reservaciones aún.</p>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </div>
    </div>

    <footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Carretera. Federal Pachuca - México 36.5, 55740 Tecámac,
                                Estado de México. Plaza Power Center. 
                                Horario de Atención 10:00 AM A 21:00 PM
							</li>
							<li>Teléfono: 123-456-7890</li>
							<li>Fax: 55555300</li>
							<li>EmaiL: hellokitty's@gmail.com</li>
						</ul>
						<div class="social-icons">
							<span class="facebook">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
							<span class="twitter">
								<i class="fa-brands fa-twitter"></i>
							</span>
							<span class="youtube">
								<i class="fa-brands fa-youtube"></i>
							</span>
							<span class="pinterest">
								<i class="fa-brands fa-pinterest-p"></i>
							</span>
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li>Acerca de Nosotros</li>
							<li>Información Delivery</li>
							<li>Politicas de Privacidad</li>
							<li>Términos y condiciones</li>
							<li>Contactános</li>
						</ul>
					</div>

					<div class="my-account">
						<p class="title-footer">Mi cuenta</p>

						<ul>
							<li>Mi cuenta</li>
							<li>Historial de ordenes</li>
							<li>Lista de deseos</li>
							<li>Boletín</li>
							<li>Reembolsos</li>
						</ul>
					</div>
					</div>
				</div>
			</div>
		</footer>

    <script src="https://kit.fontawesome.com/39904c0e5e.js" crossorigin="anonymous"></script>

</body>

</html>