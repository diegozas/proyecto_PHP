<?php
    include_once("../model/Administrador.php");
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $ci=$_POST["ci"];
    $pass=$_POST["pass"];
    $debito=$_POST["debito"];
    $credito=$_POST["credito"];
    $tipo=$_POST["cliente"];
    
    if($nombre==null||$apellido==null||$ci==null||$pass==null||$debito==null||$credito==null||$pass==null){
        echo "<h2>Llene todos los campos <br></h2>";
        echo "<a id='alta' href='../view/altaClienteView.php'>Alta Cliente</a>";
    }else{
        if($ci<0||$debito<0||$credito<0){
            echo "<h2>Los campos ci, debito y credito deben ser mayor a 0 <br><h2>";
            echo "<a id='alta' href='../view/altaClienteView.php'>Alta Cliente</a>";
        }else{
            $administrador=new Administrador($ci,$nombre,$apellido,$pass);
   
            if($administrador->altaUsuario($ci,$nombre,$tipo,$credito,$debito)){
                echo "<h1>se registro el cliente correctamente</h1>";
                echo "<a id='registro' href='../view/index.php'>Volver</a>";
            }else{
                echo "<h1>ya existe un cliente con esa ci</h1>";
                echo "<a id='registro' href='../view/index.php'>Volver</a>";
            }

        }

    }


    

?>