<?php 
//creamos la sesion
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location:index.php'); 
  exit();
}
 ?>
<!DOCTYPE HTML>
<html>
<?php include "header.php";
	include "../conexion.php";
	header("Content-Type: text/html;charset=utf-8");
	mysqli_query($conn, "SET NAMES 'utf8'");

	$id = $_GET['id'];
	//consulta noticia con id
	$result= mysqli_query($conn, "SELECT * FROM noticias WHERE id_noticias =".$_GET['id']);
	while ($row = mysqli_fetch_array($result)) {
	$ruta = "imagenesNoticias/" . $row['imagen'];//tomamos la ruta de la imagen de la noticia
	
 ?>
 <h3 class="text-center" style="color:blue">Actualizar noticia</h3>
	<div class="container">
		<!-- Formulario -->

		<form enctype="multipart/form-data"  method="post" name="agregarnoticia" class="form-horizontal">
			<!--Titulo-->

			<div class="form-group">
				<label class="col-md-3 control-label">Titulo:</label>
				<div class="col-md-5">
					<input type="text" class="form-control input-md" id="txttitulo" name="titulo" placeholder="Escriba título" maxlength="200" required="" value="<?php echo $row['titulo'] ?>">
				</div>
			<!--Imagen-->
			</div>
			<div class="form-group">
				<label for="imagen" class="col-md-3 control-label">Imagen:</label>
				<div class="col-md-5">
					<img class="img-responsive" width="100px" src="<?php echo $ruta; ?>">
					<input type="hidden" name="imagenanterior" value="<?php echo $ruta; ?>">
					<input type="file" name="imagen" id="imagen" class="input-file" >
				</div>
			</div>
			<!--Contenido-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="contenido">Contenido:</label>
				<div class="col-md-6">
					<textarea name="contenido" id="contenido" class="form-control" rows="20"  required="" maxlength="8000" ><?php echo $row['contenido']; ?></textarea>
				</div>
			</div>

			<!--Fecha-->
			<div class="form-group">
				<label class="col-md-3 control-label" >Fecha:</label>
				<div class="col-md-1">
					<!--Dias-->
					<select name="diaSelect" class="form-control">
						<option value="01">1 </option>
						<option value="02">2 </option>
						<option value="03">3 </option>
						<option value="04">4 </option>
						<option value="05">5 </option>
						<option value="06">6 </option>
						<option value="07">7 </option>
						<option value="08">8 </option>
						<option value="09">9 </option>
						<option value="10">10 </option>
						<option value="11">11</option>
						<option value="12">12 </option>
						<option value="13">13 </option>
						<option value="14">14 </option>
						<option value="15">15 </option>
						<option value="16">16 </option>
						<option value="17">17 </option>
						<option value="18">18 </option>
						<option value="19">19 </option>
						<option value="20">20 </option>
						<option value="21">21 </option>
						<option value="22">22 </option>
						<option value="23">23 </option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">28</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
				</div>
				<div class="col-md-2">
					<!--Mes-->
					<select name="mesSelect" class="form-control">
						<option value="Enero">Enero</option>
						<option value="Febrero">Febrero</option>
						<option value="Marzo">Marzo</option>
						<option value="Abril">Abril</option>
						<option value="Mayo">Mayo</option>
						<option value="Junio">Junio</option>
						<option value="Julio">Julio</option>
						<option value="Agossto">Agosto</option>
						<option value="Septiembre">Septiembre</option>
						<option value="Octubre">Octubre</option>
						<option value="Noviembre">Noviembre</option>
						<option value="Diciembre">Diciembre</option>
					</select>
				</div>
				<div class="col-md-2">
					<!--Año-->
					<select  name="anioSelect" class="form-control">
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
					</select>
				</div>
			</div>	
			<!--Boton de agregar-->
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="col-md-5">
					<button type="submit" name="actualizar" value="subir" class="btn btn-primary">Actualizar noticia</button>
				</div> 	
			</div>

		</form>

	</div>
	
	<?php } 
		include "../conexion.php";
	
	mysqli_query($conn, "SET NAMES 'utf8'");
		if (isset($_POST['actualizar'])) {
			$ruta = "imagenesNoticias/" . $_FILES['imagen']['name'];
			$fecha =$_POST['diaSelect']."-".$_POST['mesSelect']."-".$_POST['anioSelect'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		if (!file_exists($ruta) || $_FILES['imagen']['name']==$row['imagen']) {
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false				
				if ($_FILES['imagen']['name']!="") {//SI EMODIFICA IMAGEN
					$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
					if ($resultado) {
						$nombre = $_FILES['imagen']['name'];
						unlink($_POST['imagenanterior']);
						@mysqli_query($conn, "UPDATE noticias set titulo='" . $_POST["titulo"]. "', contenido='" . $_POST["contenido"]. 
							"', imagen='" . $nombre. "', fecha='".$fecha. "' WHERE id_noticias='" . $id. "'");
						
                		echo "<p class='text-center'>Se ha actualizado la noticia exitosamente.<p>";
                		 echo'<script type="text/javascript">
                			window.location.href="vernoticias.php";
               				 </script>';

					}else{
						echo "Ocurrió un error al subir la imagen.";
					}
                //echo "<p class='text-center'><a href='agregarnoticias.php'>Atrás.</a></p>";
				}else{//sI NO SE MODIFICA IMAGEN
					$r=@mysqli_query($conn, "UPDATE noticias set titulo='" . $_POST["titulo"]. "', contenido='" . $_POST["contenido"]. "', fecha='".$fecha.
						"' WHERE id_noticias='" . $id. "'");
									}
					 echo'<script type="text/javascript">
                			window.location.href="vernoticias.php";
               				 </script>';
				
		} else {
				
			 	echo  " <p class='text-center'>".$_FILES['imagen']['name'] . " este archivo existe. </p>";
               // echo "<p class='text-center'><a href='agregarnoticias.php'>Atrás.</a></p>";
		}
	}

	?>
</body>
</html>