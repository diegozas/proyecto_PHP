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
if($_SESSION["cliente"]==null){
    session_destroy();
    header("location:index.php");
}
require_once("../controller/cVerInfoCliente.php");
echo "<h1>informacion del cliente<br></h1>";
foreach ($infoCliente as $key => $value) {
    echo "CI: ".$value['CI']."<br>";
    echo "Nombre: ".$value['nombre']."<br>";
    echo "Apellido ".$value['apellido']."<br>";
}
?>
<h1>Informacion</h1>
<table border="1">
    <tr>
        <td><strong>Numero Venta</strong></td>
        <td><strong>Total Pagado </strong></td>
        <td><strong>Comentario</strong></td>
        <td><strong>Total de articulos comprados</strong></td>
        <td><strong>Fecha de la compra</strong></td>
        <td><strong>Metodo de compra</strong></td>>
    </tr>
    <?php
    for($i=0;$i<count($comprasCliente);$i++){
        ?>
        <tr>
            <td><?php echo $comprasCliente[$i]["nro_vta"]; ?></td>
            <td><?php echo $comprasCliente[$i]["total"]; ?></td>
            <td><?php echo $comprasCliente[$i]["comentario_com"]; ?></td>
            <td><?php echo $comprasCliente[$i]["total_art"]; ?></td>
            <td><?php echo $comprasCliente[$i]["fecha_vta"]; ?></td>
            <td><?php echo $comprasCliente[$i]["metodo_pago"]; ?></td>
        </td>
        </tr>
        
    <?php
    }
    ?>
    <tr>
        <td>
            <a href="../view/carritoView.php"><input type="button" name='btnVolver' value='Volver'></a> 
        </td>
    </tr>
</table>
</body>
</html>