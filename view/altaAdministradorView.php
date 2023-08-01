<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alta Administrador</title>
</head>
<body>
<?php
session_start();
if($_SESSION["administrador"]==null){
    session_destroy();
    header("location:index.php");
}
?>
    <h1>Alta de administrador</h1>
<form method="post" action="../controller/cAltaAdministrador.php">
	<label>Cédula:</label><br>
	<input type="number" name="ci"><br><br>	
	<label>Nombre</label><br>
	<input type="text" name="nombre"><br><br>
	<label>Apellido:</label><br>
	<input type="text" name="apellido"><br><br>
	<label>Password:</label><br>
	<input type="password" name="pass"><br><br>
	<input id="administrador" name="administrador" type="hidden" value="administrador">
	<input type="submit" value="Enviar">
	<a href="/view/administradorPanelView.php"><input type="button" name='btnAlta' value='Volver'></a>
</form>






</body>
</html>