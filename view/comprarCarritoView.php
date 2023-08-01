<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirmar Compra</title>
</head>
<body>
<?php
    include_once("../controller/cComprarCarrito.php");
?>
<h1>Confirmar Compra</h1>
<p>Total a pagar=<?php echo "$total";?></p>
<form method="post" action="../controller/cConfirmarCompra.php">
<input type='hidden' name="total" value=<?php echo $total;?>>
<textarea name="comentario" rows="10" cols="50"></textarea><br>

<input type="radio" id="deb" name="tarjeta" value="debito">
<label for="debito">Debito</label><br>

<input type="radio" id="cre" name="tarjeta" value="credito">
<label for="credito">Credito</label><br>

<br>
<input type="submit" value="Enviar">
</form>
<br>
<a href="../view/carritoView.php"><input type="button" name='btnVolver' value='Volver'></a> 