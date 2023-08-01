<?php
    include_once("../model/articulo.php");
    
    
    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $stock=$_POST["stock"];
    if($estado=$_POST["estado"]==1){
        $estado="SI";
    }else{
        $estado="NO";
    }
    include_once("../view/modificarArticuloview.php");
?>
