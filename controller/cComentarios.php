<?php
    include_once("../model/comentarios.php");
    $comentarios=get_comentarios_articulos();
    $comentarios_venta=get_comentarios_ventas();
    //header("Location:../view/comentariosView.php");
?>