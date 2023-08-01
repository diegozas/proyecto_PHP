<?php
    function cerrarSesion(){
        session_start();
        session_destroy();
        unset($_COOKIE["carrito"]);
        setcookie("carrito", " ", time()-1);
    }
    
?>