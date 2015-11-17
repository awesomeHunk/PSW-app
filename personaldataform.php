<!DOCTYPE html>

<?php
session_start();
if(!isset($_SESSION["MySessionLogin"])){
header("location: login.php");
}
if(isset($_COOKIE["MyCookie"])){
	$str = $_COOKIE["MyCookie"];
} else{
	$str = "Verdana|10|0|0|0";
}
$array = explode("|",$str);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function email_check($email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$return = '<i><font color="green">Email address is correct</font></i>';
	} else {
		$return = '<b><font color="red">Email address incorrect!</font></b>';
	}
	return $return;
}

function phone_check($phone){
	if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $phone)) {
		$return = '<i><font color="green">Phone number is correct</font></i>';
	} else {
		$return = '<b><font color="red">Phone number incorrect!</font></b>';
	}
	return $return;
}

function array_to_string($array){
	$return = "";
	for($i=0; $i < count($array); $i++)
		$return = $return." ".$array[$i];
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
			
			<h1>Personal data form</h1>

			<form id="register" autocomplete="on" action="personaldataform.php" method="POST">
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
			        <input id="name" name="name" type="text" value="Test" placeholder="Enter your name" required autofocus> 
					</label>
			    </div>
			    <div> 
			        <label>User name*
			        <input id="username" name="username" type="text" value="Test" placeholder="Enter your user name" required> 
					</label>
			    </div>
			  	<div> 
			        <label>Password*
			        <input id="password" name="password" type="password" value="Test" placeholder="Enter yourpassword" required> 
					</label>
			    </div>
			    <div> 
			        <label>Email* 
			        <input id="email" name="email" type="text" value="Test@test.pl" placeholder="example@domain.com"required>
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
				    <h3>Hobby</h3>
				    	<input type="checkbox" name="hobby[]" value="Football"> Football<br/>
						<input type="checkbox" name="hobby[]" value="Volleyball"> Volleyball <br/>
						<input type="checkbox" name="hobby[]" value="Running" checked="checked"> Running<br/>
						<input type="checkbox" name="hobby[]" value="Bicycle"> Bicycle <br/>
				</div>
				<div>
					<h3>Color</h3>
						<input type="checkbox" name="color[]" value="Red"> Red<br/>
						<input type="checkbox" name="color[]" value="Blue" checked="checked"> Blue<br/>
						<input type="checkbox" name="color[]" value="Green" checked="checked" readonly> Green<br/>
						<input type="checkbox" name="color[]" value="Black"> Black<br/>
						<input type="checkbox" name="color[]" value="Yellow" checked="checked"> Yellow<br/>
						<input type="checkbox" name="color[]" value="Pink"> Pink<br/>
						<input type="checkbox" name="color[]" value="Orange" checked="checked"> Orange<br/>
				</div>
				<div>
					<h3>Car</h3>
					<select name="car">
					  <optgroup label="Opel">
					     <option value="Opel Adam">Adam</option>
					     <option value = "Opel Astra">Astra</option>
					  </optgroup>
					  <optgroup label="BMW">
					     <option value="BMX x6" selected>x6</option>
					     <option value="BMW 530x">530x</option>
					     <option value="BMW 53 Coupe">53 Coupe</option>
					  </optgroup>
					</select>
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

				<div>
					<h3>Message content</h3>
						<textarea name="message" form="register" placeholder="Enter your message here" maxlength="200" rows="5" cols="50"></textarea>
				</div>
			    
			    <button type="submit" value="Submit">Send</button>
			    <button onclick="form_canceling_prompt();" value="Reset">Clear all</button>&nbsp;
 			  </fieldset>
			</form>
<?php 
} else {
	$name = test_input($_POST["name"]);
	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);
	$email = test_input($_POST["email"]);
	$phone = test_input($_POST["phone"]);
	?>
			<fieldset> 
			    <legend><b>Your personal data</b></legend> 
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
			        <b>Email:</b> <?php echo $email; ?> <?php echo email_check($email); ?>
			    </div>    
			    <div>
			    	<b>Telephone:</b> <?php echo $phone; ?> <?php echo phone_check($phone); ?>
			    </div> 
			   
			    <div>
			    	<?php 
			    	if(count($_POST["hobby"]) > 0){
			    		echo "<b>You got ";
			    		if(count($_POST["hobby"]) == 1){
			    			echo "1 hobby:</b><br>";
			    		} else {
			    			echo count($_POST["hobby"]);
			    			echo " hobbies:</b><br>";
			    		}
			    		foreach($_POST["hobby"] AS $hobby){
			    			echo "<b>Your hobby is: </b>";
			    			echo $hobby;
			    			echo "<br>";
			    		}
			    	}
			    		?>
				</div>
				<div>
					<b>Do you like running?</b>
				<?php
					if (preg_match("/\bRunning\b/i", array_to_string($_POST["hobby"]))) {
	    				echo "Yes!<br>";
					} else {
	    				echo "No :(<br>";
					}
				?>
				</div>
				<div>
					<?php
						if(count($_POST["color"]) > 0){
							echo "<b>Your favourite ";
							if(count($_POST["color"]) == 1){
								echo "color is:</b><br>";
							} else {
								echo "colors are:</b><br>";
							}
							for($i=0; $i<count($_POST["color"]); $i++){
								echo $_POST["color"][$i];
								echo "<br>";
							}
						}
					?><br>
					<b>First color:</b> <?php echo current($_POST["color"]); ?><br>
					<b>Last color:</b> <?php echo end($_POST["color"]); ?><br>
					<b>Third color:</b> <?php reset($_POST["color"]); current($_POST["color"]); next($_POST["color"]); echo next($_POST["color"]); ?> <small><i>We intentionally missed second color.</small></i><br>
					<b>Do you like green?</b>
					<?php 
						reset($_POST["color"]);
						$like = 0;
						for($i=0; $i<count($_POST["color"]); $i++)
								if($_POST["color"][$i] == "Green")
									$like = true;
						if($like)
							echo "Yes!<br>";
						else
							echo "No :(<br>";
						 ?>
				</div>
				<div>
					<b>You are driving:</b> <?php echo $_POST["car"]; ?>
				</div>

				<div>
					<?php 
					if(!empty($_POST["message"]))
					{ 
						echo "<b>Your message:</b><br>";
						echo nl2br($_POST["message"]);
					}
					?>
				</div>

 			  </fieldset>
<?php
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