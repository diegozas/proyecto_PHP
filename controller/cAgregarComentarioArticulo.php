<?php
    include_once("../model/articulo.php");
    session_start();
    $id=0;
    $codigoArt=$_POST['codigo'];
    $comentario=$_POST['comentario'];
    if($_SESSION["cliente"] !=null){
        $id=$_SESSION["cliente"];
    }
    
    $articulobj=new Articulo();
    if($articulobj->agregarComentario($id,$codigoArt,$comentario)){
        echo "<h1>Se agrego su comentario $id $comentario</h1><br>";
        echo "<h3><a href='../view/carritoView.php'>Volver</a></h3>";
    }


?>