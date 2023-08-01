<?php
    include_once("../model/articulo.php");
    $articulobj = new Articulo();
    $codigo=$_GET["codigo"];
    $imagenes=$articulobj->getTodasLasImagenesArticulo($codigo);
    $comentarios=$articulobj->getComentarios($codigo);
    $info=$articulobj->get_info_articulo($codigo);
    include_once("../view/infoArticuloSinLoginView.php");


?>