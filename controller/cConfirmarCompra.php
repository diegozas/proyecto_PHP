<?php
    include_once("../model/confirmarcompra.php");
   session_start();
   $precioTotal=$_POST['total'];
   $comentario=$_POST['comentario'];
   $metodoPago=$_POST['tarjeta'];
   $tiempo = time() + (100 * 100);
   $ci=0;
   
   if($_SESSION["cliente"] !=null){
    $ci=$_SESSION["cliente"];
    }


   //echo "ID Cliente: $id<br> Total a pagar: $total<br> Metodo de pago: $metodoPago<br>$comentario<br>";
   
   if(isset($_COOKIE["carrito"])) {
       $articulos = unserialize($_COOKIE["carrito"]);
   }

   /*foreach ($articulos as $key => $value) {
         echo $value['codigo']."<br>";
   }
*/
   $totalArt=count($articulos);
   
    
   if(confirmarCompra($precioTotal,$ci,$metodoPago,$comentario,$totalArt,$articulos)){
        //quita los elementos del array asi en la nuva compra esta vacio
        while(count($articulos))array_pop($articulos);
        
        setcookie("carrito", serialize($articulos), $tiempo);
        echo "<h1> Gracias por su compra</h1>";
        echo"<h2><a href='../view/carritoView.php'>Volver</a></h2>";
   }
    
?>