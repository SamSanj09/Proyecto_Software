<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gestor de Tareas - Visualizador</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <header>
        <center>
            <h1 style="color: white;">Gestor de Tareas NotePad</h1>
            <p style=" line-height: 0.1;">Nosotros nos encargamos de registrar tus tareas más importante para mantener tu productividad!</p>
        </center>
    </header>

    <div class="container">
        <!-- Columna 1: Registro de Usuario -->
        <aside class="column">
            <!-- Formulario para mostrar tareas al presionar el botón -->
            <form action="" method="POST">
                <button type="submit" name="mostrarTareas">Mostrar Tareas</button>
            </form>

            <!-- Mostrar las tareas después de presionar el botón -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mostrarTareas'])) {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "gestorSoft";

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta SQL para seleccionar todas las tareas
                $sql = "SELECT * FROM tarea order by fecha1";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Error al ejecutar la consulta: " . mysqli_error($conn));
                }

                if ($result->num_rows > 0) {
                    // Mostrar los datos de cada tarea
                    while ($row = $result->fetch_assoc()) {
                        echo "Nombre: " . $row["nombre"] . " - Fecha de inicio: " . $row["fecha1"] . " - Contenido: " . $row["contenido"] . " - Estado: " . $row["estado"] . " - Prioridad: " . $row["prioridad"] . "<br>";
                    }
                } else {
                    echo "No se encontraron tareas.";
                }
                $conn->close();
            }
            ?>
        </aside>
    </div>
            <br>
            <a href="index.php">Agregar Tarea </a>
    <footer>
        <p style=" line-height: 0.5;  color: white;">Redes Sociales: <a href="#" target="_blank" style="color: #ffcc00;">Facebook</a> |
            <a href="#" target="_blank" style="color: #ffcc00;">WhatsApp</a></p>
        <p>Derechos de Autor © 2024 Cars UCB. Todos los derechos reservados.</p>
        <p>Estamos atentos a tu mensaje, escribe a nuestros contactos para más información.</p>
    </footer>
</body>

</html>
