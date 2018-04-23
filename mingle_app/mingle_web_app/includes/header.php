<?php
include 'config/db_config.php';
#include 'debugger.php';
include ("includes/class/User.php");

if (isset($_SESSION['profile_name'])) {
    $userLoggedIn = $_SESSION['profile_name'];
    $user_details_query = mysqli_query($con, "SELECT * FROM registered_employee WHERE profile_name='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
} else {
    header("Location: index.php");
}

?>


<html>
<head>
<title>Mingle</title>

<!-- Javascript -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/jquery.jcrop.js"></script>
<script src="assets/js/jcrop_bits.js"></script>

<!-- mine -->

<script type="text/javascript" src="assets/js/jquery-1.3.2.min.js"></script>
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
						<li class="active">
							<a href="home.php">
								Home
								<i class="fa fa-home fa-lg"></i>
							</a>
						</li>
						<li>
							<a href="profile.php">Profile</a>

						</li>
						<li>
							<a href="friend.html">Friends</a>
						</li>
						<li>
							<a href="settings.html">
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

