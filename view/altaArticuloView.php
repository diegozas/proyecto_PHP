<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alta Articulo</title>
</head>
<body>
    <?php
		session_start();
		$ci=0;
    
    	if($_SESSION["administrador"] !=null){
        	$ci=$_SESSION["administrador"];
    	}elseif($_SESSION["administrador"]==null){
			session_destroy();
			header("location:index.php");
		}
	?>
<form method="post" action="../controller/cAltaArticulo.php" enctype="multipart/form-data">
	<h1>Alta de Articulo</h1>
	<input type="hidden" name="ci" id="ci" value="<?php echo $ci ?>">
	<label>Codigo Articulo:</label><br>
	<input type="number" name="codArticulo"><br><br>
	<label>Nombre</label><br>
	<input type="text" name="nombre"><br><br>
	<label>Precio:</label><br>
	<input type="number" name="precio"><br><br>
	<label>Stock:</label><br>
	<input type="number" name="stock"><br><br>
 
    <input type="file" name="imagen[]" value="" multiple accept="image/*"><br><br>
	<a href="/view/administradorPanelView.php"><input type="button" name='btnAlta' value='Volver'></a>	
	<input type="submit" value="Enviar">
</form>