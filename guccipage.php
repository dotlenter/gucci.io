<?php
include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');

sec_session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
	header('Location: guccipanel.php');
} 

?>
<!DOCTYPE Html>
<html>
<head>
	<link rel="shortcut icon" href="resources/gucci-log.png">
	<meta charset="UTF-8">
	<meta name="description" content="IT 14 - SE (Messaging Website)">
	<meta name="author" content="John Mar Lorenzo">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Welcome to Gucci.io</title>
	<style>
	<?php 
	include('css/reset.css');
	include('css/font-awesome.min.css'); 
	include('css/fonts.css');
	include('css/mainstyle.css');
	include('css/mediastate.css');
	?>
</style>
<script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="body-container">
		<div class="body-wrapper">
			<header class="header-container">
				<div class="header-wrapper">
					<a href="#"><div class="logo-wrapper">
						<img src="resources/head-log.png" />
						<span>Home</span>
					</div>
				</a>
				<a href="#"><div class="about-wrapper">
					<span>About</span>
				</div>
			</a>
			<div class="search-wrapper">
				<h1 class="h1-theme" id="h1mainheader">Don't have an account? <a href="#" id="signup-link" onclick="openSignup()">Sign up<span id="showhidesgn">▼</span></a></h1>
			</div>
			<div id="signup-box">
				<form action="process_signup_mainpage.php" method="post" id="signupform">
					<h3 class="h3-theme">Name: </h3>
					<input type="text" name="name" placeholder="Name"><br />
					<h3 class="h3-theme">Email: </h3>
					<input type="email" name="uid" placeholder="Email"><br />
					<h3 class="h3-theme">Password: </h3>
					<input type="password" name="pwd" placeholder="Password"><br />
					<h3 class="h3-theme">Confirm Password: </h3>
					<input type="password" name="confirmpwd" placeholder="Confirm Password"><br />
					<p>By signing up you agree to our <a target="_blank" href="#">terms of agreement</a>.</p>
					<button>Sign Up</button>
				</form>
			</div>
		</div>
	</header>
	<div class="main-wrapper">
		<div class="maincontent-wrapper">
			<section class="content" id="welcomeMessage">
				<h1 class="h1-theme" id="h1maincontent">Welcome to Gucci.<span style="color:#00B2DB; text-shadow: 1px 1px 2px blue, 0 0 25px gray, 0 0 5px blue;">i</span><span style="color:#00FF90; text-shadow: 1px 1px 2px green, 0 0 25px gray, 0 0 5px green;">o</span> Messaging website.</h1><br>
				<p class="p-theme" id="pmaincontent">Connect easily with your friends and other fascinating people securely with our encryption algorithm. <br /> <br /> Even us developers wouldn't be able to read your messages. Your privacy is our main priority!</p>
			</section>
			<form action="includes/process_login.inc.php" method="post" id="mainlogin-form">
				<input type="text" name="uid" placeholder="Email or username"><br />
				<input type="password" name="pwd" placeholder="Password"> <button>Log in</button><br />
				<label for="checkbox"><input type="checkbox" name="remember"> <span style="color: black;">Remember me •</span> <a href="#" id="forgotpwd">Forgot password?</a></label>
			</form>
			<aside class="sidecontent">
				
			</aside>
		</div>
		<div class="maincontent-bottom-wrapper">
			<a href="#">About</a>
			<a href="#">Android App</a>
			<a href="#">Contact</a>
			<a href="#">Cookies</a>
			<a href="#">Terms</a>
			<a href="#">Privacy Policy</a>
			<a href="#">Developers</a>
			<span>© 2017 HyperBridge </span>
		</div>
	</div>
</div>
</div>
</body>
<script src="js/signup-popup.js"></script>
<script src="js/automaticslide.js"></script>
</html>