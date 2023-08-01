<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Info Articulos</title>
    <style>
        td{
            border:1px dotted #FF0000;
        }
    </style>
</head>
<body>
<?php
require_once("../controller/cInfoArticuloSinLogin.php");

?>
<h1>Informacion del Articulo</h1>

<?php
      foreach ($info as $key => $value) {
        echo "ID del articulo: ".$value['id_a']."<br>";
        echo "Nombre del articulo: ".$value['nombre']."<br>";
        echo "Precio: ".$value['precio']."<br>";
        echo "Stock: ".$value['stock']."<br>";
    }


?>



<a href="../view/index.php"><input type="button" name='btnVolver' value='Volver'></a>
<table border="1">
    <tr>
        <td><strong>Imagen</strong></td>
    </tr>
    <?php
    foreach($imagenes as $valor){
        //$nombreImagen=$articulobj->getImagenCodigo($valor);
        $ruta="../model/Imagenes/$valor";
        ?>
        <tr>
            <td><?php echo "<img src='$ruta' border='1' width='300' height='150'>";?></td>
            </td>
        </tr>
        
    <?php
    }
    ?>
</table>
<?php
           echo "<h1>Comentarios del articulo</h1><br>";
           if(!empty($comentarios)){
               foreach ($comentarios as $key => $value) {
                   echo "CI: ".$value['CI_C']." "." ";
                   echo "Comentario: ".$value['TEXTO']." ";
                   echo"<br>";
               }
           }else{
               echo"<h1>No hay comentarios del articulo<br></h1>";
           }
    ?>
</body>
</html>