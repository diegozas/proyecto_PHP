<?php
   function Conectarse(){
	$dbhost= "localhost";
	$dbuser= "root";
	$dbpass= "";
	$dbname= "proyecto";
	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	return $link;
}
?>