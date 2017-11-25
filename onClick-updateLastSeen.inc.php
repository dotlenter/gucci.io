<?php

include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');
sec_session_start();
$UID = $_SESSION['user_id'];
$now = getDatetimeNow();
$stmt = $mysqli->prepare('UPDATE users SET last_seen = ? WHERE user_id = ?');
$stmt->bind_param('si', $now, $UID);
if($stmt->execute()){
}else{
}

?>