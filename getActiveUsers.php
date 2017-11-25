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
		<li>
			<a href="guccipanel.php/messages/g/"><div class="friend-container">
				<div class="friend-wrapper">
					<div class="friendimg-wrapper"><img src="user-data/<?php echo $user_image; ?>"></div><h3 id="h3-friendnick"><?php echo $usernick; ?>
						<?php 

						$last_seen = strtotime($last_seen);
						$last_seen = (strtotime(getDatetimeNow()) - $last_seen);

						if ($last_seen > (10 * 60)) {
							?>
							<i class="fa fa-square-o" aria-hidden="true" style="color: #E26A6A;"></i>
							<?php
							$offline++;
						}
						else {
							?>
							<i class="fa fa-square-o" aria-hidden="true" style="color: #1BBC9B;"></i>
							<?php
							$online++;
						}
						?>
					</h3>
				</div>
			</div>
		</a>
	</li>
	<?php
}
}
else {
	?>
	<h3 id="h3-nofriends">You currently have no buddies. <a href="#">Find buddies</a></h3>
	<?php
}
?>
