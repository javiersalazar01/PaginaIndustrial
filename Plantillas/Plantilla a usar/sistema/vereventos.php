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
    <div class="form-group">
    </div>
		<form method="post" name="formnoticias">
    <table class="table table-hover table-bordered table-striped">
       <thead>
      <tr>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>
      </th>
      </tr>
    </thead>
    <tbody>
          <?php

            include "../conexion.php";
            header("Content-Type: text/html;charset=utf-8");
            mysqli_query($conn, "SET NAMES 'utf8'");

            $registros=10;
             @$pagina = $_GET ['pagina'];

            if (!isset($pagina)){ 
                $pagina = 1;
                $inicio = 0;
            }else{
            $inicio = ($pagina-1) * $registros;
            } 
           // $result ="SELECT id_noticias, imagen, titulo, DATE_FORMAT(fecha, '%d-%b-%Y') as fechanoticia, SUBSTRING(contenido, 1,200) as contenidoc FROM noticias ORDER BY fecha desc limit ".$inicio." , ".$registros."";
            $result ="SELECT * FROM eventos ORDER BY id_eventos desc limit ".$inicio." , ".$registros."";
            
            $cad = mysqli_query($conn,$result) or die ( 'error al listar, $pegar' .mysqli_error($conn)); 
           
            //calculamos las paginas a mostrar
 
$contar = "SELECT * FROM noticias";
$contarok = mysqli_query($conn, $contar);
$total_registros = mysqli_num_rows($contarok);
//$total_paginas = ($total_registros / $registros);
$total_paginas = ceil($total_registros / $registros); 

      $i=0;
  
    while($row = mysqli_fetch_array($cad)) {
      $ruta = "imagenesEventos/" . $row['imagen'];
      if($i%2==0)
        $classname="evenRow";
          else
        $classname="oddRow";
        ?>
        
        <tr class="<?php if(isset($classname)) echo $classname;?>"> 
          
         <td><?php echo $row['titulo']?></td> 
         <td><img  style="width:50px" src="<?php echo $ruta; ?>"></td> 
         <td class="botones">
         <input type="submit" class="btn btn-primary" id="btneditar" name="update" value="Editar" onclick="javascript: form.action='editarevento.php?id=<?php echo $row['id_eventos']; ?>';">
         <input type="submit" class="btn btn-danger" id="btneliminar" name="eliminar" value="Eliminar" onclick="javascript: form.action='eliminarEventos.php?id=<?php echo $row['id_eventos']; ?>';" >
         </td> 
         </td> 
         </tr>
          <?php 
    
    $i++;  
        }
       

?> 
     
         
     </tbody>

    </table>
</form> 
<?php 

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

echo "</p></center>";

 ?>
	</div>

</body>
</html>
