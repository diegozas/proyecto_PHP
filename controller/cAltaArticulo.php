<?php
    session_start();
    include_once("../model/administrador.php");
    include_once("../model/config.php");
    $link=Conectarse();
    $codigo=$_POST["codArticulo"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $stock=$_POST["stock"];
    $ci_adm=$_POST["ci"];
    $imagenes=array();
    
    if($codigo==null||$nombre==null||$precio==null||$stock==null){
        echo "<h2>Llene todos los campos <br></h2>";
        echo "<a id='alta' href='../view/altaArticuloView.php'>Alta Articulo</a>";
    }else{
        if($codigo<0||$precio<0||$stock<0){
            echo "<h2>Los campos codigo precio y stock deben ser mayor a 0 <br><h2>";
            echo "<a id='alta' href='../view/altaArticuloView.php'>Alta Articulo</a>";
        }else{
             if (isset($_FILES['imagen']) && (!empty($_FILES['imagen']))){
                $cantidad= count($_FILES["imagen"]["tmp_name"]);
        
                for ($i=0; $i<$cantidad; $i++){
                //Comprobamos si el fichero es una imagen
                if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){
        
                //Subimos el fichero al servidor
                move_uploaded_file($_FILES["imagen"]["tmp_name"][$i],'../model/Imagenes/'.$_FILES["imagen"]["name"][$i]);
                $imagenes[]=$_FILES["imagen"]["name"][$i];
                $validar=true;
                }
            else $validar=false;
                }   
            } 

            $administrador=new Administrador(1,"adm","adm","123");
            if($administrador->altaArticulo($ci_adm,$codigo,$nombre,$precio,$stock,true,$imagenes)){
                header("Location:../view/articuloView.php");
            //echo "<a id='alta' href='../view/altaArticuloView.php'>Alta Articulo</a>";
         }else{
            echo "<h1> ya existe un articulo con ese codigo</h1><br>";
            echo "<a id='alta' href='../view/altaArticuloView.php'>Alta Articulo</a>";
        }

        }
    }
?>