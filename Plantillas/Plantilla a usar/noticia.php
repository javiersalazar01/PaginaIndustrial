<!DOCTYPE html>
<html>
		

	<?php 
		include "header.php"; ?>

	<br>
 	<div class="container contenido">		
	<?php
		include "conexion.php";

		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_query($conn, "SET lc_time_names= 'es_ES'");
		$id = $_GET['id'];
		//consulta noticia con id
		$result= mysqli_query($conn, "SELECT *, DATE_FORMAT(fecha, '%d-%M-%Y') as fechanoticia FROM noticias WHERE id_noticias =".$_GET['id']);
		while ($row = mysqli_fetch_array($result)) {
		$ruta = "sistema/imagenesNoticias/" . $row['imagen'];//tomamos la ruta de la imagen de la noticia
		$fechaArray=explode("-", $row['fechanoticia']);

	?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-center titulos"><?php echo $row['titulo']; ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img class="img-responsive not-imagen" src="<?php echo $ruta; ?>">
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<p class="text-justify contenidoNoticia"><?php echo nl2br($row['contenido']);?></p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<small class="pull-right">Publicado el: <?php echo $fechaArray[0]." de ".ucfirst($fechaArray[1])." del ".$fechaArray[2];?></small>
		</div>
	</div>

<?php 
		}

 ?>
</div>
 <br>
 	<?php 
  include "footer.php"; ?>
	
</body>
</html>