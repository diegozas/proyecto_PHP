<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>
<body>
<?php
  session_start();
  $ci=0;
  if($_SESSION["administrador"] !=null){
      $ci=$_SESSION["administrador"];
  }
  elseif($_SESSION["administrador"]==null){
    session_destroy();
    header("location:index.php");
  }
?>
<p>&nbsp;</p>
<form name="form1" method="post" action="../model/modificarArticulo.php">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id"></td>
    </tr>
    <tr>
      <td>ID</td>
      <td><label for="id"></label>
      <input type="number" name="id" id="id" value="<?php echo $id ?>" readonly></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nombre" maxlength="300" id="nom" value="<?php echo $nombre ?>"></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td><label for="pre"></label>
      <input type="number" name="precio" id="precio" value="<?php echo $precio ?>"></td>
    </tr>
    
    <tr>
      <td>Stock</td>
      <td><label for="sto"></label>
      <input type="hidden" name="ci" id="ci" value="<?php echo $ci ?>">
      <input type="number" name="stock" id="stock" value="<?php echo $stock ?>"></td>
    </tr>
    <td>Disponible</td>
      <td><label for="dis"></label>
      <input type="text" name="estado" id="estado" value="<?php echo $estado ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>


