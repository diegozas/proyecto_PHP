<?php
    include_once("../model/articulo.php");
    $articulobj = new Articulo();
    $articulos = $articulobj->get_articulosDisponibles();
    require_once("../view/carritoView.php");
?>