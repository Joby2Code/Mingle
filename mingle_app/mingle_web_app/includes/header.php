<?php
include 'config/db_config.php';
// include 'debugger.php';
include ("includes/class/User.php");

if (isset($_SESSION['profile_name'])) {
    $userLoggedIn = $_SESSION['profile_name'];
    $user_details_query = mysqli_query($con, "SELECT * FROM registered_employee WHERE profile_name='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
    
    $post_details_query = mysqli_query($con, "select count(post_id) as tot_post from wall where profile_name='$userLoggedIn' and deleted='no'");
    $post = mysqli_fetch_array($post_details_query);
    
    $like_sql = "select count(l.like_id) as like_count from likes as l natural join wall  as w where l.post_id=w.post_id and w.profile_name='$userLoggedIn' and w.deleted='no';";
    $like_query = mysqli_query($con, $like_sql);
    $likes = mysqli_fetch_array($like_query);
    
} else {
    header("Location: index.php");
}

?>


<html>
<head>
<title>Mingle</title>

<!-- Javascript -->

<!-- Upading new version for jquery -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/jquery.jcrop.js"></script>
<script src="assets/js/jcrop_bits.js"></script>
<script src="assets/js/utilities.js"></script>

<!-- mine -->


<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/cufon-yui.js"></script>
<script type="text/javascript" src="assets/js/arial.js"></script>
<script type="text/javascript" src="assets/js/cuf_run.js"></script>

<!-- CSS -->
<link rel="stylesheet"
	href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/jquery.Jcrop.css"
	type="text/css" />

<!-- mine -->
<link href="assets/css/headstyle.css" rel="stylesheet" type="text/css" />
</head>


<body>

	<div class="main">
		<div class="main_resize">
			<div class="header">
				<div class="logo">
					<h1>
						<a href="home.php">
							<span>MIN</span>gle
							<small>Share and Collaborate</small>
						</a>
					</h1>
				</div>
				<div class="search">
					<form method="GET" id="search" action="search.php">
						<span>
							<input type="text"
								onkeyup="getLiveSearchUsers(this.value, '<?php echo $userLoggedIn; ?>')"
								placeholder="Search..." autocomplete="off" name="s" id="s" />

							<input name="searchsubmit" type="image"
								src="assets/images_header/search.gif" id="searchsubmit"
								class="btn" />
						</span>
					</form>
					<div class="search_results"></div>

					<div class="search_results_footer_empty"></div>



				</div>
				<!--/searchform -->

				<!-- menu bar -->
				<div class="clr"></div>
				<div class="menu_nav">
					<ul>
						<li>
							<a href="home.php">
								Home
								<i class="fa fa-home fa-lg"></i>
							</a>
						</li>
						<li>
							<a href="<?php echo $userLoggedIn; ?>">
				<?php echo $user['first_name']; ?>
							</a>
							<!--  <a href="profile.php">Profile</a> -->

						</li>
						<li>
							<a href="requests.php">Friends</a>
						</li>
						<li>
							<a href="settings.php">
								Settings
								<i class="fa fa-cog fa-lg"></i>
							</a>
						</li>
						<li>
							<a href="includes/handlers/logout.php">
								Log out
								<i class="fa fa-sign-out fa-lg"></i>
							</a>
						</li>
					</ul>
					<div class="clr"></div>
				</div>

			</div>

		</div>
	</div>