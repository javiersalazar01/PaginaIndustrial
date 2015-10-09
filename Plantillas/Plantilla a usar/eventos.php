<!doctype html>
<html>

<?php include "header.php"; ?>
<link href="http://www.jqueryscript.net/css/top.css" rel="stylesheet" type="text/css">
<link href="css/shadowbox.css" rel="stylesheet" type="text/css">
<link href="jquery/jquery.nailthumb.1.1.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/galery.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/shadowbox.js"></script>
<script src="jquery/jquery.nailthumb.1.1.min.js"></script>
<script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery('.demo').nailthumb({
                        imageCustomFinder: function(el){
                            var image = $('<img />').attr('src',el.attr('href').replace('/full/','/small/')).css('display','none');
                            image.attr('alt',el.attr('title'));
                            el.append(image);
                            return image;
                        },
                        titleAttr:'alt'
                    });
                    Shadowbox.init();
                });
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  <div class="container">
    
    <h1 class="titulos">EVENTOS</h1>
    <br>
    <div class="col-md-12">
    <?php 
        include "conexion.php";
        mysqli_query($conn, "SET NAMES 'utf8'");

                  $result = "SELECT * FROM eventos ORDER BY id_eventos  desc";
                  $cad = mysqli_query($conn,$result);
  
                  while ($row = mysqli_fetch_array($cad)) {
                  $ruta = "sistema/imagenesEventos/" . $row['imagen'];
     ?>
    <a class="demo nailthumb-container" rel="shadowbox[gallery]" title="<?php echo $row['titulo']; ?>" href="<?php echo $ruta; ?>"></a> 
    <?php } ?>
  </div>
  </div>

<?php include "footer.php"; ?>
</body>
</html>
