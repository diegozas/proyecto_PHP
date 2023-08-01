<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Carrito</title>
    <style>
        td{
            border:1px dotted #FF0000;
        }
    </style>
</head>
<body>
<?php
session_start();
if($_SESSION["cliente"]==null){
    session_destroy();
    header("location:index.php");
}
require_once("../controller/cCarrito.php");

?>
<h1>Articulos disponibles</h1>
<h4><a href="../controller/cVerInfoCliente.php?ci=<?php echo $_SESSION["cliente"]?>";>Ver Info</a></h4>
<h4><a href="../controller/cverCarrito.php";>Ver Carrito</a></h4>
<h4><a href="../controller/cCerrarSesion.php";>Cerrar Sesion</a></h4>
<?php
    $nombreArt="";
    if(isset($_GET['nombreArt'])){
        $nombreArt=$_GET['nombreArt'];
    }
    if(!$nombreArt==null){
        echo "Agrego el artiuclo $nombreArt al carrito";
   }

?>
<?php
  
?>
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
                
                <input type='hidden' name="id" value=<?php echo $articulos[$i]["id_a"]; ?>>
                <input type='hidden' name="nombre" value=<?php echo $articulos[$i]["nombre"]; ?>>
                <input type='hidden' name="precio" value=<?php echo $articulos[$i]["precio"]; ?>>
                <a href="../controller/cAgregarArticulo.php?codigo=<?php echo $articulos[$i]["id_a"]?> & nombre=<?php echo $articulos[$i]["nombre"]?> & precio=<?php echo $articulos[$i]["precio"]?>"><input type="button" name='btnAgregarArticulo' value='Agregar'></a>
            </td>
            <td>
                <input type='hidden' id='id' name='id' value=<?php $articulos[$i]["id_a"] ?>>
                <input type='hidden' name='nombre' value=<?php $articulos[$i]["nombre"]?>>
                <a href="../controller/cInfoArticulo.php?codigo=<?php echo $articulos[$i]["id_a"] ?>"><input type="button" name='btnInfoArticulo' value='Ver Info'></a>
            </td>
        </tr>
        
    <?php
    }
    ?>
</table>
</body>
</html>