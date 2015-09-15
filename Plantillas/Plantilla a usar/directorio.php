<!DOCTYPE html>
<?php 
include "conexion.php";
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main2.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
<style type="text/css">
body{

  color: black;
}
table th{
  text-align: center;
}
table td{
 vertical-align: center;
}

body .container{
  margin-left: 10px;
}

</style>


</head><!--/head-->

<body>
	<header id="header" roler="banner">
		<div class="row social-icons">
			<div class="pull-right social-icons">
						<a href="https://twitter.com/buhosunison"><i class="fa fa-twitter"></i></a>
						<a href="https://www.facebook.com/soy.unison.7"><i  class="fa fa-facebook"></i></a>
						<a href="http://www.oninstagram.com/soyunison"><i class="fa fa-camera-retro"></i></a>
						<a href="https://www.youtube.com/user/soyunison/featured"><i class="fa fa-youtube"></i></a>
						<a href=""></a>
			</div>
		</div>
		<nav class="row menu">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      			    
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>                        
     				</button>
      				<a class="navbar-brand" href="#">
      					<img class="img-responsive" src="images/logo.png" alt="logo">
      				</a>
   				 </div>
		            <div class="collapse navbar-collapse">
		                <ul class="nav navbar-nav navbar-right">                 
		                    <li class=""><a href="#home">INICIO</a></li>
							<li class="dropdown">
          						<a class="dropdown-toggle" data-toggle="dropdown" href="#">DEPARTAMENTO
          						<span class="caret"></span></a>
          							<ul class="dropdown-menu">
           								 <li><a href="#">MAESTROS</a></li>
           								 <li><a href="#">ORGANIGRAMA</a></li>
           								 <li><a href="#">MAPA</a></li>
           								 <li><a href="#">FECHAS IMPORTANTES</a></li>
           								 <li><a href="#">PRÁCTICAS PROFESIONALES</a></li>
         						    </ul>
     					    </li> 
     					    <li ><a href="#event">NOTICIAS</a></li>
     					    <li class="dropdown">
          						<a class="dropdown-toggle" data-toggle="dropdown" href="#">OFERTA EDUCATIVA
          						<span class="caret"></span></a>
          							<ul class="dropdown-menu">
           								 <li><a href="#">POSGRADO EN ING. INDUSTRIAL</a></li>
           								 <li><a href="#">MAESTRÍA EN SUSTENTABILIDAD</a></li>
           								 <li><a href="#">ESPECIALIDAD EN DESARROLLO SUSTENTABLE</a></li>
           								 <li><a href="#">ING. INDUSTRIAL Y DE SISTEMAS</a></li>
           								 <li><a href="#">ING. EN SISTEMAS DE INFORMACIÓN</a></li>
           								 <li><a href="#">ING. EN MECATRONICA</a></li>
         						    </ul>
     					    </li>                               
		                    <li ><a href="#">SITIOS DE INTERES</a></li>
		                    <li ><a href="#">CONTACTO</a></li>        
		                </ul>
		            </div>
   
  			</div>
		</nav>

	</header>
  <H1 align="center">JEFATURA DEL DEPARTAMENTO DE INSDUSTRIAL</H1>
  <br>
<table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>NOMBRE</th>
        <th>CARGO</th>
        <th>CORREO ELECTRONICO</th>
        <th>UBICACION</th>
        <th>TELEFONO</th>
        </tr>
    </thead>
    <tbody>

<div class="container"></div>
<?php 
  $result = "SELECT *  FROM jefatura ORDER BY cargo ASC ";
  $cad = mysqli_query($conn,$result) or die ( 'error al listar, $pegar' .mysqli_error($conn)); 
  //calculamos las paginas a mostrar


  while ($row = mysqli_fetch_array($cad)) {
?>
 <tr> 
<td align="center"><?php echo $row['encargado']; ?></td>
<td align="center"><?php echo $row['cargo']; ?></td>
<td align="center"><?php echo $row['email']; ?></td>
<td align="center"><?php echo $row['ubicacion']; ?></td>
<td align="center"><?php echo $row['telefono']; ?></td>
  </tr>    
        
<?php  }?>
</tbody>
  </table>
  <br>

<H1 align="center">Coordinadores de los Programas adscritos al Departamento</H1>
  <br>
<table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>NOMBRE</th>
        <th>COORDINACION</th>
        <th>CORREO ELECTRONICO</th>
        <th>UBICACION</th>
        <th>TELEFONO</th>
        </tr>
    </thead>
    <tbody>

<div class="container"></div>
<?php 
  $result = "SELECT *  FROM coordinacion ORDER BY coordinacion ASC ";
  $cad = mysqli_query($conn,$result) or die ( 'error al listar, $pegar' .mysqli_error($conn)); 
  //calculamos las paginas a mostrar


  while ($row = mysqli_fetch_array($cad)) {
?>
 <tr> 
<td align="center"><?php echo $row['coordinador']; ?></td>
<td align="center"><?php echo $row['cordinacion']; ?></td>
<td align="center"><?php echo $row['email']; ?></td>
<td align="center"><?php echo $row['ubicacion']; ?></td>
<td align="center"><?php echo $row['telefono']; ?></td>
  </tr>    
        
<?php   
  }


?>
</tbody>
  </table>

</form>
</body>
</html>