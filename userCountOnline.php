<?php
include_once('includes/db_connect.inc.php');
include_once('includes/functions.inc.php');
sec_Session_start();
$UID = $_SESSION['user_id'];
$selectUsers = "SELECT member_id, user_id, user_image, lastname, firstname, last_seen, usernick, status FROM users WHERE user_id IN(Select user_two_id from friends where (user_one_id = ?) AND status = 1) ORDER BY last_seen DESC, usernick DESC";

$stmt = $mysqli->prepare($selectUsers);
$stmt->bind_param('i', $UID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($member_id, $user_id, $user_image, $lastname, $firstname, $last_seen, $usernick, $status);

$numOfFriends = $stmt->num_rows;
$online = $offline = 0;

if($numOfFriends > 0){

	while ($stmt->fetch()) { 
		?>
		
		<?php 

		$last_seen = strtotime($last_seen);
		$last_seen = (strtotime(getDatetimeNow()) - $last_seen);

		if ($last_seen > (10 * 60)) {
			$offline++;
		}
		else {
			$online++;
		}
	}
}
?>
<h3 class="h3-infofriends">(<span style="color:#3498db;"><?php echo $numOfFriends; ?></span>) Buddies, (<span style="color: #1BBC9B;"><?php echo $online; ?></span>)Online</h3>