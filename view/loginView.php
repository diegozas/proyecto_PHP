<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
<h1>Log in tienda virtual</h1>   
<form method="post" action="../controller/cLogin.php">
	<label>Cédula:</label><br>
	<input type="number" name="ci"><br><br>
	<label>Password:</label><br>
	<input type="password" name="pass"><br><br>
  
<input type="radio" id="adm" name="usuario" value="administrador">
<label for="administrador">Administrador</label><br>

<input type="radio" id="cli" name="usuario" value="cliente">
<label for="cliente">Cliente</label><br>

<br>
<input type="submit" value="Enviar">
</form>
<br>