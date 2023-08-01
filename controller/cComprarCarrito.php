<?php
    session_start();
    $id=0;
    $total=$_GET['total'];

    if(isset($_COOKIE["carrito"])) {
        $articulos = unserialize($_COOKIE["carrito"]);
    }

    if($_SESSION["cliente"] !=null){
        $id=$_SESSION["cliente"];
    }
     
    include_once("../view/comprarCarritoView.php");
?>