<?php
    include_once("../model/login.php");
    session_start();
    $ci=$_POST["ci"];
    $pass=$_POST["pass"];
    $tipo=$_POST["usuario"];
    $articulos=array();
    $tiempo = time() + (100 * 100);
    if(login($ci,$pass,$tipo)){
        if($tipo=="administrador"){ 
            $_SESSION["administrador"] = $ci;
            header("location:../view/administradorPanelView.php");
        }
		else if($tipo=="cliente"){
            setcookie("carrito", serialize($articulos), $tiempo);
            $_SESSION["cliente"] = $ci;
            header("location:../view/carritoView.php");
        }
    }else{
        echo "<h1>ci o pass incorrecto</h1>";
        echo "<a href='../view/index.php'>Inicio</a>"."<br>";
        echo "<a href='../view/loginView.php'>Iniciar sesion</a>"."<br>";
    }
	

?>