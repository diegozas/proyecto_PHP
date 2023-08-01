<?php
    class Persona{
      private $ci;
      private $nombre;
      private $apellido;  

      public function __construct($ci,$nombre,$apellido){
        $this->$ci=$ci;
        $this->$nombre=$nombre;
        $this->apellido=$apellido;   
      }

      public function getCi(){
        return $this->ci;
      }

      public function getNombre(){
        return $this->nombre;
      }

      public function getApellido(){
        return $this->apellido;
      }


      public function setApellido($apellido){
        $this->apellido=$apellido;
      }
   
      public function setNombre($nombre){
         $this->nombre=$nombre;
      }
   
      public function setCi($ci){
         $this->ci=$ci;
      }





















    }

?>