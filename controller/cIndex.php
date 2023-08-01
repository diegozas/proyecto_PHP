<?php
    include_once("../model/articulo.php");
    $articulobj = new Articulo();
    $articulos = $articulobj->get_articulosDisponibles();
    //$nombreImagen=$articulobj->getImagen(5);
    //$ruta="../model/Imagenes/$nombreImagen";
    //echo "<img src='$ruta' border='0' width='300' height='100'>"; 
    require_once("../view/index.php");
?>