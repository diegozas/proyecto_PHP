<?php
    include_once("../model/cerrarSesion.php");
    cerrarSesion();
    header("location:../view/index.php");
?>