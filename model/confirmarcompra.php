<?php 
     include_once("config.php");

    
    
    function confirmarCompra($precioTotal,$ci,$metodoPago,$comentario,$totalArt,$articulos){          
        $link=Conectarse();
        $fecha=date('Y-m-d');
        foreach ($articulos as $key => $value) {
            $articulo=$value['codigo'];
            $sql="UPDATE ARTICULO SET STOCK=STOCK-1 WHERE ID_A='$articulo'";
            mysqli_query($link,$sql);
            
           
        }
        $sql="INSERT INTO venta (total, ci_c, metodo_pago, fecha_vta, comentario_com, total_art) VALUES ('$precioTotal','$ci','$metodoPago','$fecha','$comentario','$totalArt')";
        mysqli_query($link,$sql);
        mysqli_close($link);
        return true;

    }





?>