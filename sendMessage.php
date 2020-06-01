<?php
$key = "abominable";
$message = $_POST['message'];
include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');
sec_session_Start();
$message = encrypt($message, $key);
$buddyID = $_SESSION['buddyID'];
$selectBuddyID = "SELECT userauth.user_id, users.user_image, userauth.name FROM userauth, users WHERE userauth.uid = ? AND userauth.user_id = users.user_id";
$stmt = $mysqli->prepare($selectBuddyID);
$stmt->bind_param('s', $buddyID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($rec_id, $buddy_img, $buddy_name);
$stmt->fetch();
$message = mysqli_escape_string($mysqli, trim($message));
$IDself = $_SESSION['user_id'];
$message_Type = "Normal";
$insertMessage = "INSERT INTO messages(sender_id, participants_id, message_type, message)VALUES(?, ?, ?, ?)";
$stmt = $mysqli->prepare($insertMessage);
$stmt->bind_param('iiss', $IDself, $rec_id, $message_Type, $message);
$stmt->execute();

$selectMessages = "SELECT messages.msg_id, messages.sender_id, messages.participants_id, messages.message_type, messages.message, messages.send_date 
FROM messages
WHERE (messages.sender_id = ? AND messages.participants_id = ?) 
OR (messages.sender_id = ? AND messages.participants_id = ?) 
ORDER BY messages.send_date ASC";

$stmt = $mysqli->prepare($selectMessages);
$stmt->bind_param('iiii', $UID, $rec_id, $rec_id, $UID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($msg_id, $sender_id, $reciever_id, $message_type, $message, $date);
$numOfMessages = $stmt->num_rows;
if($numOfMessages > 0){
	while($stmt->fetch()){
		
		if($sender_id == $UID){
			?>
			<li class="chat-container">
				<h5 id="divider-header"></h5>
				<p class="chat-self"><?php echo decrypt($message, $key); ?></p><span id="chat-time-self"><?php echo $date; ?></span>
			</li>
			<?php
		}
		else{
			?>

			<li class="chat-container">
				<h5 id="divider-header"><?php echo $buddy_name; ?></h5>
				<img src="user-data/<?php echo $buddy_img; ?>" class="chatbuddy-image"><p class="chat-buddy"><?php echo decrypt($message, $key); ?></p><span id="chat-time-buddy"><?php echo $date; ?></span>
			</li>
			<?php
		}	
	}
}else{
	?>
	<div class="chatlogs-empty"><p>No interaction recorded. Send a message to your buddy!</p></div>
	<?php
}

header("Location: " . $_SESSION['currentHeader']);
?>