<?php
include("includes/header.php"); //Header 
?>

<div class="main">
	<div class="content_resize">
	<div class="main_column column">
	<h4>Friend Requests</h4>

	<?php  
	$query = mysqli_query($con, "SELECT * FROM relationship WHERE receiver_name='$userLoggedIn' AND friendship_status= 'Sent'");
	
	if(mysqli_num_rows($query) == 0)
		echo "You have no friend requests at this time!";
	else {

		while($row = mysqli_fetch_array($query)) {
			$user_from = $row['sender_name'];
			$user_from_obj = new User($con, $user_from);
			
			echo $user_from_obj->getFirstAndLastName() . " sent you a friend request!";

			#$user_from_friend_array = $user_from_obj->getFriendArray();

			if(isset($_POST['accept_request' . $user_from ])) {
				$add_friend_query = mysqli_query($con, "UPDATE relationship SET friendship_status= 'Accepted' WHERE receiver_name='$userLoggedIn' AND sender_name= '$user_from'");
				echo "You are now friends!";
				header("Location: requests.php");
			}

			if(isset($_POST['ignore_request' . $user_from ])) {
				$delete_query = mysqli_query($con, "UPDATE relationship SET friendship_status= 'Declined' WHERE receiver_name='$userLoggedIn' AND sender_name= '$user_from'");
				echo "Request ignored!";
				header("Location: requests.php");
			}

			?>
			<form action="requests.php" method="POST">
				<input type="submit" name="accept_request<?php echo $user_from; ?>" id="accept_button" value="Accept">
				<input type="submit" name="ignore_request<?php echo $user_from; ?>" id="ignore_button" value="Ignore">
			</form>
			<?php


		}

	}

	?>
	<h4>Friend list</h4>
	<?php 
		$receiverquery = mysqli_query($con, "SELECT * FROM relationship WHERE receiver_name='$userLoggedIn' AND friendship_status= 'Accepted'");
		$senderquery = mysqli_query($con, "SELECT * FROM relationship WHERE sender_name='$userLoggedIn' AND friendship_status= 'Accepted'");
		if(mysqli_num_rows($receiverquery) == 0 && mysqli_num_rows($senderquery) == 0)
			echo "You have no friend at this time!";
		else if(mysqli_num_rows($receiverquery) == 0){
			while($row = mysqli_fetch_array($receiverquery)) {
				$user_from = $row['receiver_name'];
				$user_from_obj = new User($con, $user_from);
				echo $user_from_obj->getFirstAndLastName() . "<br>";

			}
		}
		else if(mysqli_num_rows($senderquery) == 0){
			while($row = mysqli_fetch_array($receiverquery)) {
				$user_from = $row['sender_name'];
				$user_from_obj = new User($con, $user_from);
				echo $user_from_obj->getFirstAndLastName() . "<br>";
			}
		}
		else{
			while($row = mysqli_fetch_array($receiverquery)) {
				$user_from = $row['sender_name'];
				$user_from_obj = new User($con, $user_from);
				echo $user_from_obj->getFirstAndLastName() . "<br>"; 
			}
			while($row = mysqli_fetch_array($senderquery)) {
				$user_from = $row['receiver_name'];
				$user_from_obj = new User($con, $user_from);
				echo $user_from_obj->getFirstAndLastName() . "<br>";
			}
		}
	?>
	</div>
</div>
</div>

<?php
include 'includes/footer.php';
?>