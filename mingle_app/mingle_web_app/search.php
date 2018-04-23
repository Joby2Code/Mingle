<?php
include 'includes/header.php';
include 'config/db_config.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    debug_to_console($query);
} else {
    $query = "";
}
?>




<div class="main">
	<div class="content_resize">
		

<?php
if ($query == "")
    echo 'Please enter to search';
else {
    $names = explode(" ", $query);
    
    // If there are two words, assume they are first and last names respectively
    if (count($names) == 2)
        $usersReturnedQuery = mysqli_query($con, "SELECT * FROM registered_employee WHERE first_name LIKE '$names[0]%' AND last_name LIKE '$names[1]%' LIMIT 8");
    // If query has one word only, search first names or last names
    else
        $usersReturnedQuery = mysqli_query($con, "SELECT * FROM registered_employee WHERE first_name LIKE '$query%' or last_name LIKE '$query%' or profile_name like '$query%' LIMIT 8");
}

?>
			
</div>	
</div>

<?php include 'includes/footer.php';?>