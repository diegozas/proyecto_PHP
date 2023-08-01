<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Panel Administrador</title>
</head>
<body>
	<h1>Panel Administrador</h1>
	<section>
        <?php
            session_start();
            if($_SESSION["administrador"]==null){
                session_destroy();
                header("location:index.php");
            }
        
        ?>
		<h2><a href="altaArticuloView.php">Alta Articulo</a></h2><br>
        <h2><a href="articuloView.php">Modificar Articulos</a></h2><br>
        <h2><a href="altaAdministradorView.php">Alta Administrador</a></h2><br>
        <h2><a href="usuariosRegistradosView.php">Ver Usuarios registrados</a></h2><br>
        <h2><a href="comentariosView.php">Ver Comentarios</a></h2><br>
        <h2><a href="../controller/cCerrarSesion.php">Cerrar Sesion</a></h2><br>
	</section>
</body>
</html>