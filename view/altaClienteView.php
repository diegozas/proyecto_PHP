<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alta Cliente</title>
</head>
<body>
    
<form method="post" action="../controller/cAltaCliente.php">
	<h1>Alta de cliente</h1>
	<label>Cédula:</label><br>
	<input type="number" name="ci"><br><br>
	<label>Nombre</label><br>
	<input type="text" name="nombre"><br><br>
	<label>Apellido:</label><br>
	<input type="text" name="apellido"><br><br>
	<label>Password:</label><br>
	<input type="password" name="pass"><br><br>
    <label>Tarjeta Débito:</label><br>
	<input type="number" name="debito"><br><br>
    <label>Tarjeta Crédito:</label><br>
	<input type="number" name="credito"><br><br>
    <input id="cliente" name="cliente" type="hidden" value="cliente">

	<input type="submit" value="Enviar">
</form>