<?php
	include_once('includes/db_connect.inc.php');
	include_once('includes/functions.inc.php');

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
			include('css/default.css');
			include('css/mediastate.css');
			?>
		</style>
		<script src="js/jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="header-container">
				<header class="header-wrapper">
					<a href=""><img src="resources/head-log.png" /></a>
				</header>
			</div>
			<div class="main-container">
				<section class="main-wrapper">
					<div class="form-container">
						<form action="process_signup_mainpage.php" method="POST">
							<h3 id="h3-tags">Name: </h3>
							<input type="text" name="name" placeholder="Name"><br>
							<h3 id="h3-tags">Email: </h3>
							<input type="text" name="name" placeholder="Email"><br>
							<h3 id="h3-tags">Password: </h3>
							<input type="text" name="name" placeholder="Password"><br>
							<h3 id="h3-tags">Confirm Password: </h3>
							<input type="text" name="name" placeholder="Confirm Password"><br>
							<p>By signing up you agree to our <a target="_blank" href="#">terms of agreement</a>.</p>
							<button>Sign Up</button>
						</form>
					</div>
				</section>
			</div>
		</div>
	</body>
	</html>