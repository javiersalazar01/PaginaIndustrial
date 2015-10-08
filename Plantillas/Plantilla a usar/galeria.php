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
    
    <h2 class="titulos">EVENTOS DEL DEPARTAMENTO</h2>
    <br>
    <a class="demo nailthumb-container" rel="shadowbox[gallery]" title="Image Title" href="img/1.jpg"></a> 
    <a class="demo nailthumb-container" rel="shadowbox[gallery]" title="Image Title" href="img/2.jpg"></a> 
    <a class="demo nailthumb-container" rel="shadowbox[gallery]" title="3.jpg" href="img/3.jpg"></a>
    <a class="demo nailthumb-container" rel="shadowbox[gallery]" title="4.jpg" href="img/4.jpg"></a>
  </div>

<?php include "footer.php"; ?>
</body>
</html>
