<?php
    include_once("persona.php");
    include_once("config.php");
    class Administrador extends Persona{
        private $pass;

    public function __construct($ci,$nombre,$apellido,$pass){
        parent::__construct($ci,$nombre,$apellido);
        $this->pass=$pass;
    
    }
    
        
    public function getPass(){
        return $this->pass;
    }
    
    public function maxIdImagen(){
        $link=Conectarse();
        $sql="SELECT id_img FROM IMAGEN";
        $valor=mysqli_query($link,$sql);
        $idMax=1;
        while($filas= mysqli_fetch_assoc($valor)){
            $idMax=$filas['id_img'];
            if($filas['id_img'] > $idMax){
                $idMax=$filas['id_img'];
            }elseif($filas['id_img']<$idMax){
                $idMax=$idMax;
            }
        }
        $idMax=$idMax+1;
        return $idMax;
    }
    
    public function altaUsuario($ci,$nombre,$tipo,$tarjetaC,$tarjetaD){
        $link = Conectarse();  
        $nombre=$nombre;
        $apellido=$this->getApellido();
        $ci=$ci;
        $pass=$this->getPass();
        $tipo=$tipo;

        if($tipo=="administrador"){
            $sql="SELECT * FROM ADMINISTRADOR WHERE DOC_ADM='$ci'";
            $resultado=mysqli_query($link,$sql);
            //si es true no hay un usuario con ese ci por lo que se puede dar de alta
            if( mysqli_num_rows($resultado) == 0){
                $sql="SELECT * FROM PERSONA WHERE CI='$ci'";
                $resultado=mysqli_query($link,$sql);
                if(mysqli_num_rows($resultado) == 0){
                    $sql="INSERT INTO PERSONA (CI,NOMBRE,APELLIDO) VALUES ('$ci','$nombre','$apellido')";
                    $query=mysqli_query($link,$sql);
                }
                $sql="INSERT INTO ADMINISTRADOR (DOC_ADM,PASS) VALUES ('$ci','$pass')";
                $query=mysqli_query($link,$sql);
                mysqli_close($link);
                return true;

            }else{
                mysqli_close($link);
                return false;
            }
        }else if ($tipo=="cliente"){
            $sql="SELECT * FROM CLIENTE WHERE CI_C='$ci'";
            $resultado=mysqli_query($link,$sql);
            //si es true no hay un usuario con ese ci por lo que se puede dar de alta
            if( mysqli_num_rows($resultado) == 0){
                $sql="SELECT * FROM PERSONA WHERE CI='$ci'";
                $resultado=mysqli_query($link,$sql);
                if(mysqli_num_rows($resultado) == 0){
                    $sql="INSERT INTO PERSONA (CI,NOMBRE,APELLIDO) VALUES ('$ci','$nombre','$apellido')";
                    $query=mysqli_query($link,$sql);
                }
                $sql="INSERT INTO CLIENTE (CI_C,PASS,TARJ_C,TARJ_D) VALUES ('$ci','$pass','$tarjetaC','$tarjetaD')";
                $query=mysqli_query($link,$sql);
                mysqli_close($link);
                return true;
            }else{
                mysqli_close($link);
                return false;
            }        
        }
        
    }
    
    
    public function cambiarEstadoArticulo($ci,$codigoArticulo){
        $link=Conectarse();
        
        $sql="UPDATE ARTICULO SET ESTADO='false' WHERE ID_A='$codigoArticulo'";
        mysqli_query($link,$sql);
        
        $sql="INSERT INTO GESTIONA (DOC_ADM, ID_A)VALUES('$ci','$codigoArticulo')";
        mysqli_query($link,$sql);
        
        mysqli_close($link);
        return true;
    }



    public function borrarArticulo($ci,$codigoArticulo){
        $link=Conectarse();
        $sql="SELECT ID_IMAGEN FROM TIENE_A WHERE ID_A='$codigoArticulo'";
        $resultado=mysqli_query($link,$sql);
        $imagenes=array();
        //me guardo las imagenes del artiuclo a borrar
        while($filas=mysqli_fetch_array($resultado)){
            $imagenes[]=$filas[0];
        }
        
        $sql="DELETE FROM TIENE_A WHERE ID_A='$codigoArticulo'";
        mysqli_query($link,$sql);
        if(!empty($imagenes)){
            foreach($imagenes as $valor){
                $sql="DELETE FROM IMAGEN WHERE ID_IMG='$valor'";
                mysqli_query($link,$sql);
            }
        }
        $sql="DELETE FROM COMENTARIO WHERE ID_ART='$codigoArticulo'";
        mysqli_query($link,$sql);
        
        $sql="INSERT INTO GESTIONA (DOC_ADM, ID_A)VALUES('$ci','$codigoArticulo')";
        mysqli_query($link,$sql);
        
        $sql="DELETE FROM ARTICULO WHERE ID_A='$codigoArticulo'";
        mysqli_query($link,$sql);
       
      
        
        mysqli_close($link);
        return true;


    }

    public function altaArticulo($ci,$id,$nombre,$precio,$stock,$estado,$imagenes){
        $link=Conectarse();
        $sql="SELECT ID_A FROM ARTICULO WHERE ID_A='$id'";
        $resultado=mysqli_query($link,$sql);
        //si es true no hay un articulo con ese id por lo que se puede dar de alta
        if( mysqli_num_rows($resultado) == 0){
            $sql="INSERT INTO ARTICULO (ID_A,NOMBRE,PRECIO,STOCK,ESTADO) VALUES ('$id','$nombre','$precio','$stock','$estado')";
            mysqli_query($link,$sql);
            $sql="INSERT INTO GESTIONA (DOC_ADM, ID_A)VALUES('$ci','$id')";
            mysqli_query($link,$sql);
            $idMax=$this->maxIdImagen();
            if(!empty($imagenes)){
                foreach ($imagenes as $valor){
                    $sql="INSERT INTO IMAGEN (ID_IMG,IMG) VALUES ('$idMax','$valor')";
                    mysqli_query($link,$sql);
                    $sql="INSERT INTO TIENE_A (ID_IMAGEN,ID_A) VALUES ('$idMax','$id')";
                    mysqli_query($link,$sql);
                    $idMax++;
                }
            }
            mysqli_close($link);
            return true;
        
        }else{
            mysqli_close($link);
            return false;
        }
    }







}

    


?>