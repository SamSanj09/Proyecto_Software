<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    session_start();
     
    $_SESSION['username'] = $_POST['username'];
	$_SESSION['pass']=$_POST['pass'];

	if($_SESSION['username']!="Admi" || $_SESSION['pass']!="Contraseña")
	{
		header('Location: mal.html');
	}
	//////////////////////////////////////////////////
	else
	{
		header('Location: index.php');
	}
?>
</body>
</html>