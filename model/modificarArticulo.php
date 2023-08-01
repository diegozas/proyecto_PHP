<?php
    include("config.php");
    $link=Conectarse(); 
    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $stock=$_POST["stock"];
    $ci=$_POST["ci"];
    if($estado=$_POST["estado"]=="SI"||$estado=$_POST["estado"]=="si"){
      $estado=true;
  }else{
      $estado=false;
  }
  
     $sql="INSERT INTO GESTIONA (DOC_ADM, ID_A)VALUES('$ci','$id')";
     mysqli_query($link,$sql);
  
    $sql="UPDATE articulo SET nombre ='$nombre', precio='$precio', stock ='$stock', estado ='$estado' WHERE id_a='$id' ";
    $query=mysqli_query($link,$sql);
    
    mysqli_close($link);
    header("location:../view/articuloView.php");
?>
