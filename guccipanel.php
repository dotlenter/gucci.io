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
</head>
<body>
	<div class="body-container">
		<div class="body-wrapper">
			<section class="account-settings-container">
				<div class="account-settings-wrapper">
					<?php 
					$user_prof_image = "profile-default.png";
					
					$stmt = $mysqli->prepare('SELECT user_image FROM users where user_id = ?');
					$stmt->bind_param('i', $_SESSION['user_id']);
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($user_prof_image);
					$stmt->fetch();


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
							<div class="addmorebud"><a href="" id="addmorebud">Add more buddies</a></div>
						</div>
					</div>
					<div class="account-settings-footer-container">
						<a href="#0" class="popup-confirm-logout" id="logout-button">Log out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
					</div>
				</div>
			</section>
			<section class="chatbox-container">
				<div class="chatbox-wrapper">
					<div class="header-buddy-container">
						
					</div>	
				</div>
			</section>
		</div>
	</div>
	<div class="cd-popup" role="alert">
		<div class="cd-popup-container">
			<p>Are you sure you want to log out?</p>
			<ul class="cd-buttons">
				<li><a href="userout.php" class="yes-toggle-popup">Yes</a></li>
				<li><a href="javascript:void(0)" class="no-toggle-popup">No</a></li>
			</ul>
			<a href="#0" class="cd-popup-close img-replace"></a>
		</div> <!-- cd-popup-container -->
	</div> <!-- cd-popup -->
	<script src="js/checkUserclick.js"></script>
	<script src="js/ajax-Live-getActivefriends.js"></script>
	<script src="js/ajax-Live-getFigUserOnline.js"></script>	
	<script src="js/popup-logout.js"></script>
</body>
</html>
