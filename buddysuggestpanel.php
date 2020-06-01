<?php 
include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');
ob_start();
sec_session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
	header("Location: guccipage.php");
}
include_once('includes/onLoad-updateLastSeen.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="resources/gucci-log.png">
	<meta charset="UTF-8">
	<meta name="description" content="IT 14 - SE (Messaging Website)">
	<meta name="author" content="John Mar Lorenzo">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Gucci.io</title>
	<style>
	<?php 
	include('css/reset.css');
	include('css/font-awesome.min.css'); 
	include('css/fonts.css');
	include('css/user-panel.css');
	include('css/mediastate.css');
	?>
</style>
<script src="js/jquery.min.js"></script>	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/ajax-sendMessage.js"></script>
</head>
<body onload="getConvo()">
	<div class="body-container">
		<div class="body-wrapper">
			<section class="account-settings-container">
				<div class="account-settings-wrapper">
					<?php 
					$user_prof_image = "profile-default.png";
					include_once 'includes/userInformation.inc.php';
					?>
					<div id="user-pic"><a href="guccipanel.php"><img src="user-data/<?php echo $user_prof_image; ?>"></a></div>
					<h2 id="user-name"><?php echo $_SESSION['nickname']; ?></h2>
					<a href="<?php echo 'profile.php/?' . $_SESSION['username']; ?>" id="email-link"><?php echo $_SESSION['username']; ?></a>
					<div class="affiliations-container">
						<div class="input-group">
							<form action="searchAffiliation.php" method="POST">
								<input type="text" id="search-friend-tb" placeholder="Search buddies..." aria-describedby="basic-addon2">
								<span class="input-group-addon fa fa-search" id="basic-addon2" style="color: white;"></span>		
							</form>
							<div class="container-box-friends">
								<?php
								include_once('includes/onLoad-getActiveUsers.inc.php');
								?>
							</div>
							<div class="buddies-info-container">
								<h3 class="h3-infofriends">(<span style="color:#3498db;"><?php echo $numOfFriends; ?></span>) Buddies, (<span style="color: #1BBC9B;"><?php echo $online; ?></span>)Online</h3>
								
							</div>
							<div class="addmorebud"><a href="buddysuggestpanel.php" id="addmorebud">Add more buddies</a></div>
						</div>
					</div>
					<div class="account-settings-footer-container">
						<a href="#0" class="popup-confirm-logout" id="logout-button">Log out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
					</div>
				</div>
			</section>
			<div class="search-container-buddySuggest">
				<div class="search-wrapper-buddySuggest">
					<form name="suggestBuddy-form">
					<input type="text" name="suggestBuddy" placeholder="Enter name here...">
				</form>
				</div>
			</div>
		</div>
	</div>
	<script src="js/ajax-getConversation.js"></script>
</body>
</html>