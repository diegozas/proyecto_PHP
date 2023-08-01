<?php
    include_once("../model/articulo.php");
    $articulobj = new Articulo();
    $articulos = $articulobj->get_articulos();
    require_once("../view/articuloView.php");
?>