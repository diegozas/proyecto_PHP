<?php
   //$articulos=array();
   $tiempo = time() + (100 * 100);
   $total=0;
   if(isset($_COOKIE["carrito"])) {
      $articulos = unserialize($_COOKIE["carrito"]);
   } 
   
   foreach ($articulos as $key => $value) {
      $total=$total+$value['precio'];
   }
 
   setcookie("carrito", serialize($articulos), $tiempo);
   include_once("../view/verCarritoView.php");
?>