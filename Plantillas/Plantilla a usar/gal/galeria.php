<!doctype html>
<html>
<head>

<link href="http://www.jqueryscript.net/css/top.css" rel="stylesheet" type="text/css">
<link href="shadowbox.css" rel="stylesheet" type="text/css">
<link href="jquery/jquery.nailthumb.1.1.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="galery.c">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="shadowbox.js"></script>
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
<style type="text/css" media="screen">
.demo {
width: 150px;
height: 150px;
background-image: url("path/to/loadingplaceholder");
background-position: center center;
background-repeat: no-repeat;
display: inline-block;
}
</style>

</head>

<body>

<!--Aqui van todas las imagenes que se desean mostrar-->
<a class="demo nailthumb-container" rel="shadowbox[gallery]" title="Image Title" href="img/1.jpg"></a> 
<a class="demo nailthumb-container" rel="shadowbox[gallery]" title="Image Title" href="img/2.jpg"></a> 
<a class="demo nailthumb-container" rel="shadowbox[gallery]" title="3.jpg" href="img/3.jpg"></a>
<a class="demo nailthumb-container" rel="shadowbox[gallery]" title="4.jpg" href="img/4.jpg"></a>
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
</body>
</html>
