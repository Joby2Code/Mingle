<?php
require '../../config/db_config.php';
include("../classes/User.php");
include("../classes/Post.php");
#Mingle


if(isset($_POST['post_body'])) {
    
    $post = new Post($con, $_POST['user_from']);
    $post->submitPost($_POST['post_body'], $_POST['user_to']);
}

?>