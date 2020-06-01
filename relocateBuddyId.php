<?php
include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');
sec_Session_start();

$UID = $_SESSION['user_id'];
$selectMessages = "SELECT messages.msg_id, conversation.title, messages.sender_id, messages.participants_id, messages.message_type, messages.message, messages.send_date FROM conversation INNER JOIN messages ON conversation.conv_id = messages.conv_id WHERE (messages.sender_id = ? or messages.participants_id = ?) AND (messages.sender_id = ? OR messages.participants_id = ?) ORDER BY messages.send_date ASC";

$stmt = $mysqli->prepare($selectMessages);
$stmt->bind_param('iI', $UID, $UID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($msg_id, $title, $sender_id, $reciever_id, $message_type, $message, $date);
?>