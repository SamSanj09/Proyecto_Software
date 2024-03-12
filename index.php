<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gestor de Tareas</title>
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
    <h4 style="font-size: 20px">

    </h4>

    <?php
    $servername = "localhost"; // o 127.0.0.1
    $username = "root"; // Tu nombre de usuario de MySQL
    $password = ""; // Deja la contraseña en blanco, o la que hayas establecido si la cambiaste
    $database = "gestorSoft"; // Nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Comprobar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los datos del formulario
        $nombre = $_POST['nombre'] ?? '';
        $fecha1 = $_POST['fecha1'] ?? '';
        $fecha2 = $_POST['fecha2'] ?? '';
        $contenido = $_POST['contenido'] ?? '';
        $prioridad = $_POST['prioridad'] ?? '';
        $estado = $_POST['estado'] ?? '';

        // Preparar la consulta SQL para insertar los datos
        $sql_tarea = "INSERT INTO tarea (nombre, fecha1, contenido, prioridad, estado) 
        VALUES ('$nombre', '$fecha1', '$contenido', '$prioridad', '$estado')";
        // Ejecutar la consulta SQL
        if ($conn->query($sql_tarea) === TRUE) 
		{
            echo '<script>alert("Los datos se han insertado correctamente :)");</script>';
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }
    }
    ?>
    <div class="container">

        <!-- Columna 1: Registro de Usuario -->
        <aside class="column">
            <h2>INGRESE NOMBRE DE LA TAREA</h2>
            <form action="" method="POST">
                <input type="text" name="nombre" /><br>
                <h2>INGRESE LA FECHA DE INICIO</h2>
                <input type="text" name="fecha1" /><br>
                <h2>INGRESE DESCRIPCIÓN DE LA TAREA</h2>
                <input type="text" name="contenido" /><br>
                <h2>INGRESE PRIORIDAD DE LA TAREA</h2>
                <select name="prioridad">
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baja">Baja</option>
                </select>
                    <h2>INGRESE EL ESTADO ACTUAL</h2>
                <select name="estado">
                    <option value="Nueva">Nueva</option>
                    <option value="En Curso">En Curso</option>
                </select>
                <br>
            
        </aside>
    </div>
    <p>
        <input type="submit" value="Guardar Tarea" style="background-color: #F0E68C;" />
    </p>
    <hr>
    <a href="visualizador.php">Revisar Tareas Agendadas</a>

    <footer>
        <p style=" line-height: 0.5;  color: white;">Redes Sociales: <a href="#" target="_blank" style="color: #ffcc00;">Facebook</a> |
            <a href="#" target="_blank" style="color: #ffcc00;">WhatsApp</a></p>
        <p>Derechos de Autor © 2024 Cars UCB. Todos los derechos reservados.</p>
        <p>Estamos atentos a tu mensaje, escribe a nuestros contactos para más información.</p>
    </footer>

</body>

</html>
