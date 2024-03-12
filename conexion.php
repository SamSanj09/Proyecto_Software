<!DOCTYPE html>
<html lang="es">
<?php
session_start();
session_destroy(); 
?>
<head>
    <meta charset="UTF-8">
    <title>CREAR MI SESION</title>
    <link rel="stylesheet" href="estilo3.css">
</head>
<body>
            <section class="container7">
                <center>
                    <h1>CREACION DE MI SESION</h1>
                    <form action="./checkin.php" method="POST">
                        <p>
                            <label>Nombre de Estudiante</label> <br />
                            <input type="text" name="username" />
                        </p>
                        <p>
                            <label>Escriba su contraseña</label> <br />
                            <input type="pass" name="pass" />
                        </p>
                        <p>
                            <input type="submit" value="Iniciar Sesión" />
                        </p>
                    </form>
                </center>
            </section>
</body>
</html>