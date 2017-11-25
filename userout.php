<?php
include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');

sec_session_start();
$user_id = $_SESSION['user_id'];

$timeLogout = date("Y\-m\-d\ h:i:s", strtotime("-10 minutes", strtotime(getDatetimeNow())));

$stmt = $mysqli->prepare("UPDATE users SET last_seen = ?, status = 'Offline' WHERE user_id = ?");
$stmt->bind_param('si', $timeLogout, $user_id);
$stmt->execute();

$_SESSION['loggedIn'] = false;

$_SESSION = array();

$params = session_get_cookie_params();

setcookie(session_name(),
	'', time() - 42000, 
	$params["path"], 
	$params["domain"], 
	$params["secure"], 
	$params["httponly"]);

header("Location: guccipage.php");
session_destroy();

?>