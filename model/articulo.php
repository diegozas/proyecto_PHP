<?php
    include_once("config.php");
    class Articulo{
        private $id;
        private $nombre;
        private $precio;
        private $stock;
        private $estado;
        private $articulos;
        private $comentarios;
        private $info;
    public function __construct(){
        $this->articulos= array();
        $this->comentarios=array();
        $this->info=array();    
    }
    
    public function get_articulos(){
        $link = Conectarse();
        $sql = "SELECT * FROM articulo;";
        $resultado=mysqli_query($link, $sql);
        while($filas = mysqli_fetch_array($resultado)){
            $this->articulos[]=$filas;
        }
        mysqli_close($link);
        return $this->articulos;
    }  

    public function get_articulosDisponibles(){
        $link = Conectarse();
        $sql = "SELECT * FROM articulo WHERE STOCK>0 AND ESTADO=TRUE;";
        $resultado=mysqli_query($link, $sql);
        while($filas = mysqli_fetch_array($resultado)){
            $this->articulos[]=$filas;
        }
        mysqli_close($link);
        return $this->articulos;
        
    } 

    public function getComentarios($codigoArt){
        $link = Conectarse();
        $sql="SELECT CI_C,TEXTO FROM COMENTARIO WHERE ID_ART='$codigoArt'";
        $resultado=mysqli_query($link, $sql);
        while($filas = mysqli_fetch_assoc($resultado)){
            $this->comentarios[]=$filas;
        }
        mysqli_close($link);
        return $this->comentarios;
    }

    public function agregarComentario($ci,$codigoArt,$comentario){
        $link = Conectarse();
        $sql="INSERT INTO COMENTARIO(CI_C,ID_ART,TEXTO) VALUES ('$ci','$codigoArt','$comentario')";
        $resultado=mysqli_query($link, $sql);
        mysqli_close($link);
        return true;
    }
    public function getTodasLasImagenesArticulo($codigoArt){
        $link = Conectarse();
        $imagenes=array();
        $imagenesRetornar=array();
       
        $sql = "SELECT id_imagen FROM TIENE_A WHERE ID_A='$codigoArt'";
        $resultado=mysqli_query($link, $sql);
        
        //guardo los id imagen del articulo
        while($filas = mysqli_fetch_assoc($resultado)){
            $imagenes[]=$filas['id_imagen'];
        }

        foreach($imagenes as $valor){
            $sql="SELECT IMG FROM IMAGEN WHERE ID_IMG='$valor'";
            $nombre=mysqli_query($link,$sql);
            while($filas=mysqli_fetch_assoc($nombre)){
                $imagenesRetornar[]=$filas['IMG'];
            }
        }
        mysqli_close($link);
        return $imagenesRetornar;
    }


    public function getImagen($codigo){
        $link=Conectarse();
        $sql="SELECT id_imagen FROM TIENE_A WHERE ID_A='$codigo'";
        $valor=mysqli_query($link,$sql);
        $idMax=1;
        while($filas= mysqli_fetch_assoc($valor)){
            $idMax=$filas['id_imagen'];
            if($filas['id_imagen'] > $idMax){
                $idMax=$filas['id_imagen'];
            }elseif($filas['id_imagen']<$idMax){
                $idMax=$idMax;
            }
        }
        
        $sql="SELECT IMG FROM IMAGEN WHERE ID_IMG='$idMax'";
        $valor=mysqli_query($link,$sql);
        $nombreImagen="";
        while($filas= mysqli_fetch_assoc($valor)){
            $nombreImagen=$filas['IMG'];
        }
        mysqli_close($link);
        return $nombreImagen;

    }



    public function get_info_articulo($codigo){
        $link=Conectarse();
        $sql="SELECT * FROM ARTICULO WHERE ID_A='$codigo'";
        $resultado=mysqli_query($link,$sql);
        while($filas = mysqli_fetch_assoc($resultado)){
            $this->info[]=$filas;
        }
        mysqli_close($link);
        return $this->info;
    
    }


   
    }
?>