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
<?php include "header.php"; ?>

	<div class="container">
		<!-- Formulario -->
		<form enctype="multipart/form-data" action="subir.php" method="post" name="agregarnoticia" class="form-horizontal">
			<!--Titulo-->
			<div class="form-group">
				<label class="col-md-3 control-label">Titulo:</label>
				<div class="col-md-5">
					<input type="text" class="form-control input-md" id="txttitulo" name="titulo" placeholder="Escriba título" maxlength="200" required="">
				</div>
			<!--Imagen-->
			</div>
			<div class="form-group">
				<label for="imagen" class="col-md-3 control-label">Imagen:</label>
				<div class="col-md-5">
					<input type="file" name="imagen" id="imagen" class="input-file"  required="">
				</div>
			</div>
			<!--Contenido-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="contenido">Contenido:</label>
				<div class="col-md-6">
					<textarea name="contenido" id="contenido" class="form-control" rows="20"  required="" maxlength="8000" ></textarea>
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
					<button type="submit" name="subir" value="subir" class="btn btn-primary">Añadir noticia</button>
				</div> 	
			</div>

		</form>

	</div>

</body>
</html>