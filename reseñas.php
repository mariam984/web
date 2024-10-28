<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"/>
		<title>KITTY'CAFE</title>
		<link rel="stylesheet" href="styles.css" />
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
						<a href="reservaciones.php"> REALIZA TU RESERVACION</a>
						<a href="fotos.html"> FOTOS</a>
						
					</ul>
				</nav>
			</div>
<style> 
body {
    font-family: Arial, sans-serif;
    background-color:  #c9b4c2;
    margin: 0;
    padding: 0;
}

.leo {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #FA7788; 
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
textarea,
select {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ff038d;
    border-radius: 4px;
    font-size: 16px;
}

button {
    padding: 10px;
    background-color: #cf0e6f;
    border: none;
    color: #fff;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #aa1868;
}

.uno {
    margin-top: 30px;
}

.dos {
    padding: 15px;
    border: 1px solid #e777cf;
    border-radius: 4px;
    margin-bottom: 15px;
}

</style>

</head>
<body>
    <div class="leo">
        <h1>Deja tu Reseña</h1>
        <form action="submit.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="calificacion">Calificación:</label>
            <select id="calificacion" name="calificacion" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" required></textarea>

            <button type="submit">Enviar Reseña</button>
        </form>

        <h2>Reseñas Recientes</h2>
        <div class="uno">
            <?php
            // Configuración de la base de datos
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

            // Consultar las reseñas
            $sql = "SELECT nombre, email, calificacion, comentario, fecha FROM comen ORDER BY fecha DESC";
            $result = $conn->query($sql);

            // Mostrar las reseñas
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='dos'>";
                    echo "<h3>" . htmlspecialchars($row['nombre']) . " (Calificación: " . htmlspecialchars($row['calificacion']) . ")</h3>";
                    echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
                    echo "<p><strong>Comentario:</strong> " . htmlspecialchars($row['comentario']) . "</p>";
                    echo "<p><em>Fecha: " . htmlspecialchars($row['fecha']) . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay reseñas aún.</p>";
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
								Carretera. Federal Pachuca - México 36.5, 55740 Tecámac, Estado de México. Plaza Power Center.

                          Horario de Atención
                          10:00 AM A 21:00 PM
 
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
							<li> Acerca de Nosotros</li>
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
		</footer>

    <script src="https://kit.fontawesome.com/39904c0e5e.js" crossorigin="anonymous"></script>
</body>
</html>