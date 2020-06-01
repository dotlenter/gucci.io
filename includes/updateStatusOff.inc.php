<?php

include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');
	
$now = getDatetimeNow();
$stmt = $mysqli->prepare('UPDATE users SET status = "Offline" WHERE user_id = ?');
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();

?>