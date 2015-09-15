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
  <H1 align="center">LISTADO DE MAESTROS</H1>
<table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Docente</th>
        <th>Correo Electronico</th>
        <th>Cubiculo</th>
        </tr>
    </thead>
    <tbody>

<div class="container"></div>
<?php $registros=15;
  @$pagina = $_GET ['pagina'];

if (!isset($pagina))
{
$pagina = 1;
$inicio = 0;
}
else
{
$inicio = ($pagina-1) * $registros;
} 
  $result = "SELECT *  FROM maestros
  ORDER BY name ASC ";
  $cad = mysqli_query($conn,$result) or die ( 'error al listar, $pegar' .mysqli_error($conn)); 
  //calculamos las paginas a mostrar

$contar = "SELECT * FROM maestros";
$contarok = mysqli_query($conn, $contar);
$total_registros = mysqli_num_rows($contarok);
//$total_paginas = ($total_registros / $registros);
$total_paginas = ceil($total_registros / $registros); 


  while ($row = mysqli_fetch_array($cad)) {
?>
 <tr> 
  <td align="center"><?php echo $row['name']; ?></td>
<td align="center"><?php echo $row['email']; ?></td>
<td align="center"><?php echo $row['cubiculo']; ?></td>
  </tr>    
        
<?php   
  }

  
  //creando los enlaces de paginacion de resultados

echo "<center><p>";


if($total_registros>$registros){
if(($pagina - 1) > 0) {
echo "<span class='pactiva' ><a href='?pagina=".($pagina-1)."' style='color:blue'>&laquo; Anterior</a></span> ";
}
// Numero de paginas a mostrar
$num_paginas=10;
//limitando las paginas mostradas
$pagina_intervalo=ceil($num_paginas/2)-1;

// Calculamos desde que numero de pagina se mostrara
$pagina_desde=$pagina-$pagina_intervalo;
$pagina_hasta=$pagina+$pagina_intervalo;

// Verificar que pagina_desde sea negativo
if($pagina_desde<1){ // le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados $pagina_hasta-=($pagina_desde-1); $pagina_desde=1; } // Verificar que pagina_hasta no sea mayor que paginas_totales if($pagina_hasta>$total_paginas){
$pagina_desde-=($pagina_hasta-$total_paginas);
$pagina_hasta=$total_paginas;
if($pagina_desde<1){
$pagina_desde=1;
}
}

for ($i=$pagina_desde; $i<=$pagina_hasta; $i++){
if ($pagina == $i){
echo "<span class='pnumero' style='color:black' >".$pagina."</span> ";
}else{
echo "<span class='active' ><a style='color:blue' href='?pagina=$i'>$i</a></span> ";
}
}

if(($pagina + 1)<=$total_paginas) {
echo " <span class='pactiva'><a style='color:blue' href='?pagina=".($pagina+1)."'>Siguiente &raquo;</a></span>";
}
}

echo "</p></center>";?>
?>
</tbody>
  </table>
</form>
</body>
</html>