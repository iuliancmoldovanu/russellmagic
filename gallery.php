<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name=viewport content="width=device-width, initial-scale=1">
<meta name="description" content="Welcome to Russell's Magic Gallery Page">
<meta name="robots" content="index,follow">
<meta name="googlebot" content="index,follow">
<meta name="revisit-after" content="1 day">
<meta name="verify-v1" content="">
<title>Russells Magic gallery page</title>
<link rel="alternate" href="http://russellsmagic.co.uk//" hreflang="x-default" />
<link href='http://fonts.googleapis.com/css?family=Peralta|Lily+Script+One|Jacques+Francois' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<!-- WIDGET -->
<script type='text/javascript' src='widget/scripts/lightbox.js'></script>
<link type='text/css' href='widget/css/lightbox.css' rel='stylesheet'/>
<link type='text/css' href='widget/css/sample_lightbox_layout.css' rel='stylesheet'/>
<!-- END WIDGET -->
</head>

<body>
<img src="images/winter.jpg" class="bg">
<?php include('includes/header.php'); ?>
<div id="container">
	<h1>Gallery</h1>
    <div id="gallery" class="lbGallery">
    
		<?php
            $highFrame = glob("images/640_480/*.jpg");
            $lowFrame = glob("images/150_113/*.jpg");
			
            echo '<table><tr>';
            for ($i=0; $i<count($lowFrame); $i++)
            {
                $low = $lowFrame[$i];
                $high = $highFrame[$i];
                echo '<td><a href="' . $high . '" ><div class="widget_div">';
                echo '<img src="'.$low.'" alt="random image" /></div></a></td>';
                if($i%4 == 3){
                    echo '</tr><tr>';	
                }
            }
            echo '</tr></table>';
        ?>
        
    </div><br />
<?php include('includes/footer.php'); ?>
</div>
<script type="text/javascript" src='widget/scripts/custom.js'></script>
</body>
</html>