<?php
    include_once("../model/cliente.php");
    $ci=$_GET['ci'];
    $cliente=new Cliente();
    $infoCliente=$cliente->getInfoCliente($ci);
    $comprasCliente=$cliente->getComprasCliente($ci);
    include_once("../view/infoClienteView.php");
   
    
?>