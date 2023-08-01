<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Index</title>
    <style>
        td{
            border:1px dotted #FF0000;
        }
    </style>
</head>
<body>
<?php
require_once("../controller/cIndex.php");

?>
<h1>Articulos disponibles</h1>
<a href="altaClienteView.php">Registrarse</a> <a href="loginView.php">Ingresar</a> 
<table border="1">
    <tr>
        <td><strong>Nombre articulo</strong></td>
        <td><strong>Precio articulo</strong></td>
        <td><strong>Imagen</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($articulos);$i++){
        $nombreImagen=$articulobj->getImagen($articulos[$i]["id_a"]);
        $ruta="../model/Imagenes/$nombreImagen";
        ?>
     <tr>
            <td><?php echo $articulos[$i]["nombre"]; ?></td>
            <td><?php echo $articulos[$i]["precio"]; ?> USD</td>
            <td><?php echo "<img src='$ruta' border='1' width='300' height='150'>"; ;?></td>
            <td>
                <input type='hidden' id='id' name='id' value=<?php $articulos[$i]["id_a"] ?>>
                <input type='hidden' name='nombre' value=<?php $articulos[$i]["nombre"]?>>
                <a href="../controller/cInfoArticuloSinLogin.php?codigo=<?php echo $articulos[$i]["id_a"] ?>"><input type="button" name='btnInfoArticulo' value='Ver Info'></a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>