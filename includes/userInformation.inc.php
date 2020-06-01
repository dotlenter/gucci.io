<?php
	include_once('includes/db_connect.inc.php');
	include_once('includes/functions.inc.php');
	$stmt = $mysqli->prepare('SELECT user_image FROM users where user_id = ?');
	$stmt->bind_param('i', $_SESSION['user_id']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($user_prof_image);
	$stmt->fetch();

?>