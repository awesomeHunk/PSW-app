<!DOCTYPE html>

<?php
session_start();

if(isset($_COOKIE["MyCookie"])){
	$str = $_COOKIE["MyCookie"];
} else{
	$str = "Verdana|10|0|0|0";
}
$array = explode("|",$str);

	define("SUCCESS", "Congrats! You have been successfully logged in!<br>Welcome");

function success_function($login){
	return "<h3>".SUCCESS." ".$login."!</h3>";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function email_check($email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$return = true;
	} else {
		$return = false;
	}
	return $return;
}

function phone_check($phone){
	if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $phone)) {
		$return = true;
	} else {
		$return = false;
	}
	return $return;
}

$dane = array();
$dane[] = "Test";
$dane[] = "Test";
$dane[] = "Login";
$dane[] = "Haslo";
?>


<html lang="pl">
	<head>
		<title>Login</title>
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
  font-size: <?php echo $array[1]; ?>pt;
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
			
			<h1>Login form</h1>

			<form id="register" autocomplete="on" action="login.php" method="POST">
<?php 
if(!isset($_SESSION["MySessionLogin"]))
{
	if(!($_SERVER["REQUEST_METHOD"] == "POST"))
	{
	?>
				<h1>Enter your account data</h1>
				<div class="dottedline"></div>
				  <fieldset> 
				    <legend><b>Your account details</b></legend> 
				    <div> 
				        <label>User name*
				        <input id="username" name="username" type="text" value="Test" placeholder="Enter your user name" required> 
						</label>
				    </div>
				  	<div> 
				        <label>Password*
				        <input id="password" name="password" type="password" value="Test" placeholder="Enter your password" required> 
						</label>
				    </div>
				    <button type="submit" value="Submit">Send</button>
				    <button type="reset">Clear all</button>&nbsp;
	 			  </fieldset>
				</form>
	<?php 
	} else {
		$username = test_input($_POST["username"]);
		$password = test_input($_POST["password"]);
		$error = "";


		if($username != '' && $password != ''){
			$correct = false;
			for($i=0; $i<count($dane) && !$correct; $i=$i+2){
				if($dane[$i]==$username && $dane[$i+1]==$password)
					$correct = true;
			}
			if($correct){
			?>
				<fieldset> 
					<?php 
					$login = $username; 
					echo success_function($login);
					$_SESSION["MySessionLogin"] = $username;
					?>
		  		</fieldset>
			<?php
			} else {
				$error = "Wrong username or password!";
			}
		} else { 
			$error = "Enter correct username and password!";
		}
	echo '<h3><font color="red">'.$error.'</font></h3>';
	}
} else {
	echo '<h3>Hello '.$_SESSION["MySessionLogin"].', you are logged in!<br><a href="logout.php">Log out!</a></h3>';
}
?>
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