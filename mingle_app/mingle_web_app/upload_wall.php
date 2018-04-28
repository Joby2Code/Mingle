<?php
require 'config/db_config.php';
include ("includes/class/User.php");
include  ("includes/class/Post.php");


if (isset($_SESSION['profile_name'])) {
    $userLoggedIn = $_SESSION['profile_name'];
    $user_details_query = mysqli_query($con, "SELECT * FROM registered_employee WHERE profile_name='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
    $name= $user['first_name'];
}
else {
    header("Location: register.php");
}

if(isset($_POST["submit_pic"])) {
    
    $file = rand(1000,100000)."-".$_FILES['fileToUpload']['name'];
    $file_loc = $_FILES['fileToUpload']['tmp_name'];
    //$file_size = $_FILES['file']['size'];
    //$file_type = $_FILES['file']['type'];
    $folder="Upload/";
    
    
    
    $date=date("Y-m-d H:i:s");
    
    move_uploaded_file($file_loc,$folder.$file);
    $src=$folder.$file;
    $img="<img src=\'".$src."\'width=300</img>";
    
    
    
    $sql=mysqli_query($con,"INSERT INTO posts VALUES('','$img','$name','','$date','no','no','0')");
    
    
}

?>