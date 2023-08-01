<?php
    include_once("config.php");
    function login($ci,$pass,$tipo){
        $link=Conectarse();
        if($tipo=="administrador"){
            $sql="select DOC_ADM,PASS from administrador where (DOC_ADM='$ci'AND PASS='$pass')";
            $resultado=mysqli_query($link,$sql);
            //si da distinto de 0 significa que ingreso bien los datos por lo que puede logearse
            if( mysqli_num_rows($resultado) != 0){
                return true;
            }else{
                return false;
            }
        }else if($tipo=="cliente"){
            $sql="select ci_c,pass from cliente where (ci_c='$ci'AND pass='$pass')";
            $resultado=mysqli_query($link,$sql);
            //si da distinto de 0 significa que ingreso bien los datos por lo que puede logearse
            if( mysqli_num_rows($resultado) != 0){
                mysqli_close($link);
                return true;
            }else{
                mysqli_close($link);
                return false;
            }
        }
    }



?>