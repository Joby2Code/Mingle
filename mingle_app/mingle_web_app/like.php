<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<style type="text/css">
	* {
		font-family: Arial, Helvetica, Sans-serif;
	}
	body {
		background-color: #fff;
	}

	form {
		position: absolute;
		top: 0;
	}

	</style>



<?php
include "config/db_config.php";
include("includes/class/User.php");
include("includes/class/Post.php");

if (isset($_SESSION['profile_name'])) {
    $userLoggedIn = $_SESSION['profile_name'];
    $user_details_query = mysqli_query($con, "SELECT * FROM registered_employee WHERE profile_name='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}


//Get id of post
if(isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
}

//Like button
if(isset($_POST['like_button'])) {
    $check_liked = mysqli_query($con, "SELECT viewer_name FROM likes WHERE  post_id='$post_id'");
    $row = mysqli_fetch_array($check_liked);
    while($row = $row = mysqli_fetch_array($check_liked)) {
        if ($row['viewer_name'] == $userLoggedIn) {
            echo '<div>
                    "Post has already been liked!"
                 </div>';
        }
        return ;
    }
        
    $count_query = mysqli_query($con, "select count(*)  as curr_tot from likes");
    $row = mysqli_fetch_array($count_query);
    
    $like_id = 'like_'.++$row['curr_tot'];
    $date = date("Y-m-d"); // Current date
    $insert_likes = mysqli_query($con, "INSERT INTO likes VALUES('$like_id','$post_id',null,null,null,'$userLoggedIn','$date')");
}

$get_likes = mysqli_query($con, "SELECT count(distinct like_id) as tot_likes FROM likes WHERE post_id='$post_id'");
$row = mysqli_fetch_array($get_likes);
$total_likes = $row['tot_likes'];
#$user_liked = $row['added_by'];

$get_user_liked = mysqli_query($con, "SELECT viewer_name FROM likes WHERE post_id='$post_id'");
$row = mysqli_fetch_array($get_user_liked);
$user_liked = $row['viewer_name'];


$user_details_query = mysqli_query($con, "SELECT * FROM registered_employee WHERE username='$user_liked'");
$row = mysqli_fetch_array($user_details_query);
$first_name = $row['first_name'];


//Check for previous likes
$check_query = mysqli_query($con, "SELECT * FROM likes WHERE  post_id='$post_id'");
$num_rows = mysqli_num_rows($check_query);



    echo '<form action="like.php?post_id=' . $post_id . '" method="POST">
				<input type="submit" class="comment_like" name="like_button" value="Like">
				<div class="like_value">
					 '. $total_likes .'
				</div>
			</form>
		';

?>
