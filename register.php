<!DOCTYPE html>

<?php
session_start();
if(isset($_COOKIE["MyCookie"])){
	$str = $_COOKIE["MyCookie"];
} else{
	$str = "Verdana|10|0|0|0";
}
$array = explode("|",$str);


define("SUCCESS", "<h3>Congrats! Registration completed.<br> Check your email to activate your account.</h3>");

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
?>


<html lang="pl">
	<head>
		<title>Personal data form</title>
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
			
			<h1>Register form</h1>

			<form id="register" autocomplete="on" action="register.php" method="POST">
<?php 
if(!($_SERVER["REQUEST_METHOD"] == "POST"))
{
?>
			<h1>Enter your personal data</h1>
			<div class="dottedline"></div>
			  <fieldset> 
			    <legend><b>Your account details</b></legend> 
			    <div> 
			        <label>Name*
			        <input id="name" name="name" type="text" value="Test" placeholder="Enter your name" utofocus> 
					</label>
			    </div>
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
			    <div> 
			        <label>Repeat password*
			        <input id="password2" name="password2" type="password" value="Test" placeholder="Enter your password" required> 
					</label>
			    </div>
			    <div> 
			        <label>Email* 
			        <input id="email" name="email" type="text" value="Test@test.pl" placeholder="example@domain.com" required>
					</label> 
			    </div>    
			    <div> 
			        <label>Telephone*
			        <input id="phone" name="phone" type="text" value="000-000-000" placeholder="000-000-000" required>
					</label> 
			    </div> 
			    <div>
				    <h3>Sex</h3>
				    	<input type="radio" name="sex" value="male" checked="checked">Male<br>
	  					<input type="radio" name="sex" value="female">Female
			    </div>				
				<div>
					<h3>Month of your bitrh:</h3> 
					<input list="months" name="months" value="January" placeholder="eg. January">
					  <datalist id="months">
					    <option value="January">
					    <option value="February">
					    <option value="March">
					    <option value="April">
					    <option value="May">
					    <option value="June">
					    <option value="July">
					    <option value="August">
					    <option value="September">
					    <option value="October">
					    <option value="November">
					    <option value="December">
					  </datalist>
				</div>
			    
			    <button type="submit" value="Submit">Send</button>
			    <button type="reset">Clear all</button>&nbsp;
 			  </fieldset>
			</form>
<?php 
} else {
	$name = test_input($_POST["name"]);
	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);
	$password2 = test_input($_POST["password2"]);
	$email = test_input($_POST["email"]);
	$phone = test_input($_POST["phone"]);
	$error = "";


	if($name != ''){
		if($username != ''){
			if($password != '' && $password == $password2){
				if(email_check($email)){
					if(phone_check($phone)){
						?>
						<fieldset> 
							<?php echo SUCCESS; ?>
						    <legend><b>Your account details</b></legend> 
						    <div> 
						    	You are on <b><?php echo $_SERVER['HTTP_REFERER']; ?></b> site, your IP address is <b><?php echo $_SERVER["REMOTE_ADDR"]; ?></b><br>
						        You are <b><?php echo $_POST["sex"]; ?></b>, you were born in <b><?php echo $_POST["months"]; ?></b>.<br><br>
						        <b>Name:</b> <?php echo $name; ?>
						    </div>
						    <div> 
						        <b>Username:</b> <?php echo $username; ?>
						    </div>
						  	<div> 
						        <b>Password:</b> <?php echo $password; ?>
						    </div>
						    <div> 
						        <b>Email:</b> <?php echo $email; ?>
						    </div>    
						    <div>
						    	<b>Telephone:</b> <?php echo $phone; ?>
						    </div> 
 			  			</fieldset>
						<?php
					} else {
						$error = "Invalid phone number!";
					}
				} else {
					$error = "Invalid e-mail address!";
				}
			} else {
				$error = "Invalid password/passwords!";
			}
		} else {
			$error = "Invalid username!";
		}
	} else {
		$error = "Invalid name!";
	}
echo '<h3><font color="red">'.$error.'</font></h3>';
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