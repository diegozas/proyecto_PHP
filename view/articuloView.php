<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Articulos</title>
    <style>
        td{
            border:1px dotted #FF0000;
        }
    </style>
</head>
<body>
<?php
session_start();
if($_SESSION["administrador"]==null){
    session_destroy();
    header("location:index.php");
}
require_once("../controller/cArticulo.php");

?>
<h1>Articulos disponibles</h1>
<table border="1">
    <tr>
        <td><strong>ID articulo</strong></td>
        <td><strong>Nombre articulo</strong></td>
        <td><strong>Precio articulo</strong></td>
        <td><strong>Stock</strong></td><td>
        <strong>Disponible</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($articulos);$i++){
        ?>
        <?php
            $estado="";
            if($articulos[$i]["estado"]==1){
                $estado="SI";
            }elseif( $articulos[$i]["estado"]==0){
                $estado="NO";
            }
        ?>
        <tr>
            <td><?php echo $articulos[$i]["id_a"]; ?></td>
            <td><?php echo $articulos[$i]["nombre"]; ?></td>
            <td><?php echo $articulos[$i]["precio"]; ?> USD</td>
            <td><?php echo $articulos[$i]["stock"]; ?></td>
            <td><?php echo $estado; ?></td>
            <td><form action='../controller/cModifArticulo.php' method='POST'>
                <input type='hidden' name="id" value=<?php echo $articulos[$i]["id_a"]; ?>>
                <input type="hidden" name="nombre" value=<?php echo $articulos[$i]["nombre"]; ?>>
                <input type='hidden' name="nombre" maxlenght="300" value=<?php echo $articulos[$i]["nombre"]; ?>>
                <input type='hidden' name="precio" value=<?php echo $articulos[$i]["precio"]; ?>>
                <input type='hidden' name="stock" value=<?php echo $articulos[$i]["stock"]; ?>>
                <input type='hidden' name="estado" value=<?php echo $articulos[$i]["estado"]; ?>>
                <input type="submit" name='btnModificar' value='Modificar'></form>
            </td>
            <td>
                <input type='hidden' id='id' name='id' value=<?php $articulos[$i]["id_a"] ?>>
                <input type='hidden' name='nombre' value=<?php $articulos[$i]["nombre"]?>>
                <a href="../controller/cBorrarArticulo.php?codigo=<?php echo $articulos[$i]["id_a"] ?>"><input type="button" name='btnEliminar' value='Eliminar'></a>
            </td>
        </tr>
        
    <?php
    }
    ?>
       <tr>
        <td>
            <a href="/view/administradorPanelView.php"><input type="button" name='btnAlta' value='Volver'></a>
             <a href="/view/altaArticuloView.php"><input type="button" name='btnAlta' value='Insertar'></a>
        </td>  
        </tr>
</table>
</body>
</html>