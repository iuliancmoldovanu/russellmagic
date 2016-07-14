<div id="header"><!-- start #header -->
  <object  data="../header.swf" width="760" height="300">
    <param name="movie" value="../header.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don?t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. --> 
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="../header.swf" width="760" height="300">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <p>Content on this page requires Adobe Flash Player.</p>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="wedding magician parties" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>

<!-- end #header -->


<nav id="navigation">
            <ul class="menu">
                <li id="index"><a href="index.php" title="Russell's Magic London"><h3>Home</h3></a></li>
                <li id="childmagic"><a href="childmagic.php" title="Russell's Magic Childrens Show"><h3>Children's Magic</h3></a></li>
                <li id="adultmagic"><a href="adultmagic.php" title="Russell's Magic Mature Show"><h3>Adult Magic</h3></a></li>
                <li id="gallery"><a href="gallery.php" title="Russell's Magic Gallery"><h3>Gallery</h3></a></li>
                <li id="contact"><a href="contact.php" title="Russell's Magic Contact"><h3>Contact</h3></a></li>
            </ul>
            <div class="clear"></div> 
</nav>
    <script type="text/javascript">
        var url = window.location.pathname;
        var file = url.substring(url.lastIndexOf("/")+1);
		var filename = file.split(".");
		if(file == ''){
			document.getElementById('index').className = 'current';
		}else{
			document.getElementById(filename[0]).className = 'current';
		}
    </script>