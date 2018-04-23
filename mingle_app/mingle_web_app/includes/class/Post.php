<?php

class Post 
{

    private $user_obj;

    private $con;

    public function __construct($con, $user)
    {
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }

    // page=1&userLoggedIn=" + userLoggedIn,
    public function loadPostsFriends($data, $limit)
    {
        $page = $data['page'];
        $userLoggedIn = $this->user_obj->getUsername();
        if ($page == 1)
            $start = 0;
        else
            $start = ($page - 1) * $limit;
        
            
        $post_query = "select * from wall where profile_name = '$userLoggedIn' or profile_name in (select distinct receiver_name from relationship
where sender_name = '$userLoggedIn' and friendship_status = 'Accepted' or friendship_status = 'sent' and relation_type = 'T' or 'F'
);";
        #$post_query = "CALL post_retrieval('". $userLoggedIn ."')";
        
            
           
        $str = ""; // String to return
        $data_query = mysqli_query($this->con, $post_query);
        
        if (mysqli_num_rows($data_query) > 0) {
            $num_iterations = 0; // Number of results checked (not necasserily posted)
            $count = 1;
            
            while ($row = mysqli_fetch_array($data_query)) {
                $id = $row['post_id'];
                $added_by = $row['profile_name'];
                // Prepare user_to string so it can be included even if not posted to a user
                if ($row['profile_name'] == "none") {
                    $user_to = "";
                } else {
                    echo("<script>console.log(success...".$row['profile_name'].");</script>");
                    $user_to_obj = new User($this->con, $row['profile_name']);
                    $user_to_name = $user_to_obj->getFirstAndLastName();
                    $user_to = "<a href='" . $row['profile_name'] . "'>" . $user_to_name . "</a>";
                   
                }
                
                $user_logged_obj = new User($this->con, $userLoggedIn);
                if ($num_iterations ++ < $start)
                    continue;
                
                // Once 10 posts have been loaded, break
                if ($count > $limit) {
                    break;
                } else {
                    $count ++;
                }
                
                if ($userLoggedIn == $added_by)
                    $delete_button = "<button class='delete_button btn-danger' id='$id'>X</button>";
                else
                    $delete_button = "";
                
                $user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM registered_employee WHERE profile_name='$added_by'");
                $user_row = mysqli_fetch_array($user_details_query);
                $first_name = $user_row['first_name'];
                $last_name = $user_row['last_name'];
                $profile_pic = $user_row['profile_pic'];
                echo("<script>console.log(".$last_name.");</script>");
                
                ?>
				<script> 
						function toggle<?php echo $id; ?>() {

							var target = $(event.target);
							if (!target.is("a")) {
								var element = document.getElementById("toggleComment<?php echo $id; ?>");

								if(element.style.display == "block") 
									element.style.display = "none";
								else 
									element.style.display = "block";
							}
						}

				</script>

<?php
                $post_info = mysqli_query($this->con, "SELECT * from post where post_id = '$id'");
                $post_record = mysqli_fetch_array($post_info);
                $post_title = $post_record['post_title'];
                $post_desc = $post_record['post_desc'];
                $post_date = $post_record['post_time'];
                echo("<script>console.log(".$post_date.");</script>");
                $comments_check = mysqli_query($this->con, "SELECT * FROM comment WHERE post_id='$id'");
                $comments_check_num = mysqli_num_rows($comments_check);
                echo("<script>console.log(".$comments_check_num.");</script>");
                // Timeframe
                $date_time_now = date("Y-m-d H:i:s");
                $start_date = new DateTime($post_date); // Time of post
                $end_date = new DateTime($date_time_now); // Current time
                $interval = $start_date->diff($end_date); // Difference between dates
                if ($interval->y >= 1) {
                    if ($interval == 1)
                        $time_message = $interval->y . " year ago"; // 1 year ago
                    else
                        $time_message = $interval->y . " years ago"; // 1+ year ago
                } else if ($interval->m >= 1) {
                    if ($interval->d == 0) {
                        $days = " ago";
                    } else if ($interval->d == 1) {
                        $days = $interval->d . " day ago";
                    } else {
                        $days = $interval->d . " days ago";
                    }
                    if ($interval->m == 1) {
                        $time_message = $interval->m . " month" . $days;
                    } else {
                        $time_message = $interval->m . " months" . $days;
                    }
                } else if ($interval->d >= 1) {
                    if ($interval->d == 1) {
                        $time_message = "Yesterday";
                    } else {
                        $time_message = $interval->d . " days ago";
                    }
                } else if ($interval->h >= 1) {
                    if ($interval->h == 1) {
                        $time_message = $interval->h . " hour ago";
                    } else {
                        $time_message = $interval->h . " hours ago";
                    }
                } else if ($interval->i >= 1) {
                    if ($interval->i == 1) {
                        $time_message = $interval->i . " minute ago";
                    } else {
                        $time_message = $interval->i . " minutes ago";
                    }
                } else {
                    if ($interval->s < 30) {
                        $time_message = "Just now";
                    } else {
                        $time_message = $interval->s . " seconds ago";
                    }
                }
                echo("<script>console.log(".$time_message.");</script>");
                
                $str .= "<div class='status_post' onClick='javascript:toggle$id()'>
					       <div class='post_profile_pic'>
						      <img src='$profile_pic' width='50'>
						   </div>

					       <div class='posted_by' style='color:#ACACAC;'>
							     <a href='$added_by'> $first_name $last_name </a> &nbsp;&nbsp;&nbsp;$time_message
									$delete_button
						   </div>
						  <div id='post_body'>
									$post_title
									<br>
									<br>
                                     $post_desc
									<br>
						  </div>

				          <div class='newsfeedPostOptions'>
								     Comments($comments_check_num)&nbsp;&nbsp;&nbsp;
									<iframe src='like.php?post_id=$id' scrolling='no'></iframe>
						</div>

						</div>
						<div class='post_comment' id='toggleComment$id' style='display:none;'>
							<iframe src='comment_frame.php?post_id=$id' id='comment_iframe' frameborder='0'></iframe>
						</div>
						<hr>";
                
                ?>
			<script>

					$(document).ready(function() {

						$('#post<?php echo $id; ?>').on('click', function() {
							bootbox.confirm("Are you sure you want to delete this post?", function(result) {

								$.post("includes/form_handlers/delete_post.php?post_id=<?php echo $id; ?>", {result:result});

								if(result)
									location.reload();

							});
						});


					});

				</script>
<?php
            } // End while loop
            
            if ($count > $limit)
                $str .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
							<input type='hidden' class='noMorePosts' value='false'>";
            else
                $str .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: centre;'> No more posts to show! </p>";
        }
        
        echo $str;
    }
}
