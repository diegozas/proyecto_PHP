<?php
    include_once("config.php");
    function get_clientes(){
        $link=Conectarse();
        $clientes=array();
        $sql="SELECT DISTINCT CI,NOMBRE,APELLIDO FROM PERSONA JOIN CLIENTE ON PERSONA.CI=CLIENTE.CI_C";
        $resultado=mysqli_query($link,$sql);
        while($filas=mysqli_fetch_array($resultado)){
            $clientes[]=$filas;
        }
        mysqli_close($link);
        return $clientes;
    }
    function get_administradores(){
        $link=Conectarse();
        $administradores=array();
        $sql="SELECT DISTINCT CI,NOMBRE,APELLIDO FROM PERSONA JOIN ADMINISTRADOR ON PERSONA.CI=ADMINISTRADOR.DOC_ADM";
        $resultado=mysqli_query($link,$sql);
        while($filas=mysqli_fetch_array($resultado)){
            $administradores[]=$filas;
        }
        mysqli_close($link);
        return $administradores;
    }

?>