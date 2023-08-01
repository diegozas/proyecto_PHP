<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Articulos a comprar</title>
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
require_once("../controller/cVerCarrito.php");
/*$tiempo = time() + (100 * 100);
$total=0;
if(isset($_COOKIE["carrito"])) {
   $articulos = unserialize($_COOKIE["carrito"]);
} 

foreach ($articulos as $key => $value) {
   $total=$total+$value['precio'];
}

//setcookie("carrito", serialize($articulos), $tiempo);
if(isset($_REQUEST['borrar'])){
    echo $_REQUEST['borrar']."<br>";
    echo "entro al request<br>";
    unset($articulos["codigo"][$_REQUEST['borrar']]);
    setcookie('carrito',serialize($articulos),$tiempo);
}

/*foreach ($articulos as $key => $value) {
    //echo $value['codigo']."<br>";
}*/
//setcookie("carrito", serialize($articulos), $tiempo);


?>
<h1>Articulos seleccionados</h1>
<table border="1">
    <tr>
        <td><strong>Nombre articulo</strong></td>
        <td><strong>Precio articulo</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($articulos);$i++){
        ?>
        <tr>
            <td><?php echo $articulos[$i]["nombre"]; ?></td>
            <td><?php echo $articulos[$i]["precio"]; ?> USD</td>
        </tr>
        
    <?php
    }
    ?>
      <tr>
        <td>
             <?php echo"Total: $total";?>
        </td>  
        </tr>
       <tr>
        <td>
             <a href="../controller/cComprarCarrito.php?total=<?php echo "$total"?>"><input type="button" name='btnComprar' value='Comprar'></a> 

         </td>  
         
         <td>
             <a href="../view/carritoView.php"><input type="button" name='btnVolver' value='Volver'></a> 
               
         </td> 
        </tr>
</table>
</body>
</html>