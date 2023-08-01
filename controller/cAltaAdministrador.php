<?php
    include_once("../model/Administrador.php");
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $ci=$_POST["ci"];
    $pass=$_POST["pass"];
    $tipo=$_POST["administrador"];
   
    if($nombre==null||$apellido==null||$ci==null||$pass==null){
        echo "<h2>Llene todos los campos <br></h2>";
        echo "<a id='alta' href='../view/altaAdministradorView.php'>Alta Administrador</a>";
    }else{
        if($ci<0){
            echo "<h2>El campo ci debe ser mayor a 0 <br><h2>";
            echo "<a id='alta' href='../view/altaAdministradorView.php'>Alta Administrador</a>";
        }else{
            $administrador=new Administrador($ci,$nombre,$apellido,$pass);
   
            if($administrador->altaUsuario($ci,$nombre,$tipo,0,0)){
                echo "<h1> se registro el adm correctamente </h1><br>";
                echo "<a id='volver' href='../view/administradorPanelView.php'>Volver</a>";
            }else
                echo "<h1> ya existe un adm con esa ci </h1><br>";
                echo "<a id='alta' href='../view/altaAdministradorView.php'>Alta Administrador</a><br>";
                echo "<a id='volver' href='../view/administradorPanelView.php'>Volver</a>";
            }
        }

    



   

?>