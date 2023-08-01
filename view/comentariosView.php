<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Comentarios</title>
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
require_once("../controller/cComentarios.php");

?>
<h1>Comentarios de los articulos</h1>
<table border="1">
    <tr>
        <td><strong>ID articulo</strong></td>
        <td><strong>Id Cliente</strong></td>
        <td><strong>Comentario</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($comentarios);$i++){
        ?>
        <?php
          
            
        ?>
        <tr>
            <td><?php echo $comentarios[$i]["id_art"]; ?></td>
            <td><?php echo $comentarios[$i]["ci_c"]; ?></td>
            <td><?php echo $comentarios[$i]["texto"]; ?></td>
    <?php
    }
    ?>
</table>

<h1>Comentarios de las ventas</h1>
<table border="1">
    <tr>
        <td><strong>ID venta</strong></td>
        <td><strong>ID Cliente</strong></td>
        <td><strong>Total de articulos comprado</strong></td>
        <td><strong>Total pagado</strong></td>
        <td><strong>Metodo de pago</strong></td>
        <td><strong>Fecha de la compra</strong></td>
        <td><strong>Comentario compra</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($comentarios_venta);$i++){
        ?>
        <?php
          
            
        ?>
        <tr>
            <td><?php echo $comentarios_venta[$i]["nro_vta"]; ?></td>
            <td><?php echo $comentarios_venta[$i]["ci_c"]; ?></td>
            <td><?php echo $comentarios_venta[$i]["total_art"]; ?></td>
            <td><?php echo $comentarios_venta[$i]["total"]; ?></td>
            <td><?php echo $comentarios_venta[$i]["metodo_pago"]; ?></td>
            <td><?php echo $comentarios_venta[$i]["fecha_vta"]; ?></td>
            <td><?php echo $comentarios_venta[$i]["comentario_com"]; ?></td>
    <?php
    }
    ?>
</table>

<a href="/view/administradorPanelView.php"><input type="button" name='btnAlta' value='Volver'></a>



</body>
</html>