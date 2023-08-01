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
require_once("../controller/cUsuariosRegistrados.php");

?>
<h1>Clientes registrados</h1>
<table border="1">
    <tr>
        <td><strong>CI</strong></td>
        <td><strong>Nombre</strong></td>
        <td><strong>Apellido</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($clientes);$i++){
        ?>
        <?php
          
            
        ?>
        <tr>
            <td><?php echo $clientes[$i][0]; ?></td>
            <td><?php echo $clientes[$i][1]; ?></td>
            <td><?php echo $clientes[$i][2]; ?></td>
    <?php
    }
    ?>
</table>

<h1>Administradores registrados</h1>
<table border="1">
    <tr>
        <td><strong>CI</strong></td>
        <td><strong>Nombre</strong></td>
        <td><strong>Apellido</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($administradores);$i++){
        ?>
        <?php
          
            
        ?>
        <tr>
            <td><?php echo $administradores[$i][0]; ?></td>
            <td><?php echo $administradores[$i][1]; ?></td>
            <td><?php echo $administradores[$i][2]; ?></td>
    <?php
    }
    ?>
</table>

<a href="/view/administradorPanelView.php"><input type="button" name='btnAlta' value='Volver'></a>



</body>
</html>