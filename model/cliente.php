<?php 
   include_once("persona.php");
   include_once("config.php");
   class Cliente extends Persona{
    private $compras;
    private $info;
    public function __construct(){
        $this->compras= array();
        $this->info=array(); 
    }
    
    public function getInfoCliente($ci){
        $link=Conectarse();
        $sql="SELECT * FROM PERSONA WHERE CI='$ci'";
        $resultado=mysqli_query($link,$sql);
        while($filas = mysqli_fetch_assoc($resultado)){
            $this->info[]=$filas;
        }
        mysqli_close($link);
        return $this->info;
    }


    public function getComprasCliente($ci){
        $link=Conectarse();
        $sql = "SELECT * FROM VENTA WHERE CI_C=$ci";
        $resultado=mysqli_query($link,$sql);
        while($filas = mysqli_fetch_array($resultado)){
            $this->compras[]=$filas;
        }
        mysqli_close($link);
        return $this->compras;
    }






   }



?>