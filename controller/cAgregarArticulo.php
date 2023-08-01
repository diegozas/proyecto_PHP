<?php
    $tiempo = time() + (100 * 100);
    $nombreArt=$_GET['nombre'];
    //Obtenemos los productos anteriores
    if(isset($_COOKIE['carrito'])) {
	    $articulos = unserialize($_COOKIE['carrito']);
    }

    //Agrego un nuevo articulo al carrito
    if(isset($_GET['codigo'])) {
	    $iUltimaPos = count($articulos);
	    $articulos[$iUltimaPos]["nombre"] = $_GET['nombre'];
	    $articulos[$iUltimaPos]["precio"] = $_GET['precio'];
        $articulos[$iUltimaPos]["codigo"] = $_GET['codigo'];
    }
    setcookie("carrito", serialize($articulos), $tiempo);
   
     
    header("Location:../view/carritoView.php?nombreArt=$nombreArt");
?>