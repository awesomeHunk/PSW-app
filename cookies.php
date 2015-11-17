<?php
session_start();
if(!isset($_SESSION["MySessionLogin"])){
header("location: login.php");
}
if(isset($_COOKIE["MyCookie"])){
	$value = $_COOKIE["MyCookie"];
} else{
	$value = "Verdana|10|0|0|0";
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$value=$_POST["cfg_font_family"].'|'.$_POST["cfg_font_size"].'|'.$_POST["cfg_red"].'|'.$_POST["cfg_green"].'|'.$_POST["cfg_blue"];
setcookie("MyCookie", $value, time()+3600);
}
$array = explode("|",$value);
?>



<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Set cookie</title>
		<meta name="author" content="Szymon Grabowski"/>
		<meta name="description" content="Form to register accont"/>
		<meta name="keywords" content="register, account, personal, data, telephone, number, email, content, software"/>
		<meta charset="UTF-8"/>

		<!-- Style dependency -->
		<link rel="shortcut icon" href="images/software_icon.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">

@import url(https://fonts.googleapis.com/css?family=Shadows+Into+Light);
@import url(https://fonts.googleapis.com/css?family=Verdana);
@import url(https://fonts.googleapis.com/css?family=Poiret+One);

body {
  font-family: <?php echo $array[0]; ?>;
  font-size: <?php echo (int)$array[1]; ?>pt;
  background: rgb(<?php echo $array[2]; ?>, <?php echo $array[3]; ?>, <?php echo $array[4]; ?>);
}

</style>

	</head>
	<body onload="set_current_menu_active('register_menu');">
		<div id="container">
	
		<div id="website_logo">
			<a href="index.html">
				<img id="logo_image" src="images/software_icon.png" alt="Logo image">
				<span>Soft<b>House</b></span>
			</a>
		</div>
		
		<nav id="menu">
			<div class="option">Main page</div>
			<div class="option">Article</div>
			<div class="option">Download</div>
			<div class="option">Contact</div>
			<div style="clear:both;"></div>
		</nav>
		
		<div id="topbar">
			<div id="topbarR">
				<h1>Co znajdziesz na tej stronie?</h1>
				Lorem esent non hendrerit risus. Nulla id semper sem. Mauris risus mauris, ultrices sed ullamcorper sed, vulputate vel nisi. Aliquam augue ante, mattis in pulvinar vitae, ultrices nec leo. Nulla ultricies augue enim, sit amet semper tellus vulputate sit amet. Maecenas tincidunt, ex eu viverra scelerisque, quam lectus auctor nunc, at pretium nibh lacus in ligula.
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<aside id="sidebar">
			<ul id="sidebar_menu">
				<li><a href="index.html" name="main_page">Main&nbsp;page</a></li>
				<li>Article
					<ul>
						<li>
							<a href="article_content_top_chromeos_apps.html">Top Chrome Apps</a>
							<ul>
								<li>
									<a href="article_content_top_chromeos_apps.html">Article</a>
								</li>
								<li>
									<a href="article_content_top_chromeos_apps.html#apps_table">Summary</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="article_content_hardwarevssoftware.html">Gaming</a>
						</li>
						<li>
							<a href="article_content_hardwarevssoftware.html">App 'Boostrl'</a>
						</li>
					</ul>
				</li>
				<li><a href="download.html">Download</a></li>
				<li><a href="contactme.html" name="contact_menu" onclick="javascript:set_current(this)" name="contact_menu">Contact</a></li>
				<?php
				if(isset($_SESSION["MySessionLogin"]))
				{
					?>
				<li><a href="personaldataform.php" onclick="javascript:set_current(this)">Personal data form</a></li>
				<li><a href="cookies.php" onclick="javascript:set_current(this)">Cookies</a></li>
					<?php
				}
				?>
				<li><a href="register.php" onclick="javascript:set_current(this)">Register</a></li>
				<li><a href="login.php" onclick="javascript:set_current(this)">Login</a></li>
			</ul>
		</aside>




		<section id="content">
			<header>
				<h3>Config tools:</h3>
				<form id="register" autocomplete="on" action="cookies.php" method="POST">
					Font size: <input type="number" id="cfg_font_size" name="cfg_font_size" min="10" max="30" value="<?php echo $array[1]; ?>"><br/>
					Font family: <select id="cfg_font_family" name="cfg_font_family">
						 				<optgroup>
						  				   <option value="Verdana" <?php if($array[0] == 'Verdana') echo 'selected="selected"'; ?>>Verdana</option>
						 				   <option value="Poiret One" <?php if($array[0] == 'Poiret One') echo 'selected="selected"'; ?>>Poiret One</option>
						  				   <option value="Shadows Into Light" <?php if($array[0] == 'Shadows Into Light') echo 'selected="selected"'; ?>>Shadows Into Light</option>
						 		 		</optgroup>
								</select><br/>
					Background color: <br/>
							red: <input type="number" id="cfg_red" name="cfg_red" min="0" max="255" value="<?php echo $array[2]; ?>">
							green: <input type="number" id="cfg_green" name="cfg_green" min="0" max="255" value="<?php echo $array[3]; ?>">
							blue: <input type="number" id="cfg_blue" name="cfg_blue" min="0" max="255" value="<?php echo $array[4]; ?>">
							<br/><br/>
				<div><button type="submit">Apply config</button></div><br/>
			</header>
		</section>	
		
		<footer id="footer">
			<b><i>SoftHouse</i></b> - best software developer. &copy; All rights reserved - 2015.
		</footer>
	
	
	

		<!-- Script injection -->
		<script src="js/app.js"></script>
		<script src="js/pierwsza.js"></script>
		<script src="js/druga.js"></script>
		<script src="js/trzecia.js"></script>
		<script src="js/czwarta.js"></script>
		<script src="js/piata.js"></script>
	</body>
</html>