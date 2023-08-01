<?php
session_start();
include_once("../model/administrador.php");
$id=$_GET["codigo"];
$ci=0;
if($_SESSION["administrador"] !=null){
    $ci=$_SESSION["administrador"];
}elseif($_SESSION["administrador"] ==null){
    session_destroy();
    header("location:../view/index.php");
}



//cambia el estado del articulo a NO
$administrador=new Administrador(1,"nombre","appelido",123);
if($administrador->cambiarEstadoArticulo($ci,$id)){
    header("Location:../view/articuloView.php");
}



//Esta funcion borra de la base de datos el articulo con sus imagenes si las tiene

/*$administrador=new Administrador(1,"nombre","apellido",123);
if($administrador->borrarArticulo($ci,$id)){
    header("Location:../view/articuloView.php");
}
*/
?>