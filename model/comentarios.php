<?php
    include_once("config.php");
    function get_comentarios_articulos(){
        $link=Conectarse();
        $comentarios=array();
        $sql="SELECT * FROM COMENTARIO";
        $resultado=mysqli_query($link,$sql);
        while($filas=mysqli_fetch_assoc($resultado)){
            $comentarios[]=$filas;
        }
        mysqli_close($link);
        return $comentarios;
    }
    function get_comentarios_ventas(){
        $link=Conectarse();
        $comentarios_venta=array();
        $sql="SELECT * FROM VENTA";
        $resultado=mysqli_query($link,$sql);
        while($filas=mysqli_fetch_assoc($resultado)){
            $comentarios_venta[]=$filas;
        }
        mysqli_close($link);
        return $comentarios_venta;
    }

?>