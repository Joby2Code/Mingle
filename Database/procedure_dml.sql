
DELIMITER $$

#Procedure 1- Insert into employee table
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_employee`( 
IN e_ssn int,
IN e_email varchar(20)
)
BEGIN
INSERT INTO employee
(
ssn,
email_id
) Values
(
e_ssn,
e_email
); 
END $$


#Procedure 2: insert into signin table
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_signin_details`( 
IN e_ssn int,
IN e_password varchar(50)
)
BEGIN
INSERT INTO signin
(
ssn,
password
) Values
(
e_ssn,
e_password
); 
END $$

#Procedure 3: for inserting registered user
DROP PROCEDURE IF EXISTS `insert_registered_employee` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_registered_employee`(
IN profile_name varchar(30),IN ssn int,
IN first_name varchar(20),IN last_name varchar(20),IN address varchar(255),IN designation varchar(20),
IN skills varchar(255),IN interests varchar(255),IN manager varchar(20),
IN level enum('A','B','C','D'),IN email_id varchar(50),
IN profile_pic blob,IN gender enum('Male','Female'),
IN access_id enum('P','T','F','S','FOF')
)
BEGIN
INSERT INTO registered_employee
(
profile_name,ssn,first_name, last_name,address,designation,skills,
interests,manager,level, email_id, profile_pic,gender,access_id
) Values
(
profile_name,ssn,first_name,last_name,address,designation,skills,interests,manager,level,
email_id,profile_pic,gender,access_id
);
END $$


#Procedure 4: for inserting post
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_post`(
IN post_id varchar(30), IN post_time timestamp,
IN post_title varchar(150),IN post_desc varchar(255),
IN access_id varchar(3)
) 
BEGIN insert into post 
( 
post_id,post_time,post_title,post_desc,access_id
) values 
(post_id,post_time,post_title,post_desc,access_id
); END $$


#Procedure 5: saving records to wall
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_to_wall`( 
IN post_id varchar(20), 
IN profile_name varchar(30) 
)
BEGIN insert into wall 
(
post_id , 
profile_name
)
values(post_id, profile_name
); 
END $$


#Procedure 6 request to connect with colleagues
DROP PROCEDURE IF EXISTS `insert_relationship` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_relationship`( 
p_sender_name varchar(30),
p_receiver_name varchar(20),
p_relation varchar(20), 
p_time_request_sent timestamp, 
friendship_status varchar(20)
)
BEGIN 
insert into relationship ( 
sender_name , receiver_name , relation_type, 
request_time, friendship_status
)
Values
(p_sender_name , p_receiver_name , p_relation , p_time_request_sent, friendship_status 
); 
END $$


#Procedure 7 insert multimedia contents
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_multimedia`( 
IN p_multimedia_id varchar(10), 
IN p_post_id varchar(20),
IN p_multimedia_name varchar(20), 
IN p_multimedia_type varchar(20),
IN p_multimedia_content blob, 
IN p_access_id varchar(5) 
) 
BEGIN insert into multimedia_content 
(
multimedia_id, post_id, multimedia_name,
multimedia_type,
multimedia_content, access_id 
) values 
( 
p_multimedia_id, p_post_id, p_multimedia_name, p_multimedia_type, 
p_multimedia_content, p_access_id 
); END $$

#Procedure 8 insert comments
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_comments`( 
IN comment_id varchar(20),IN post_id varchar(20), 
IN comment_desc varchar(255), IN comment_date datetime, 
IN commentor_name varchar(30),
IN access_id varchar(5)
 ) 
BEGIN insert into comment 
(
comment_id, 
post_id, comment_desc, comment_date, commentor_name,access_id
)
values( 
comment_id, post_id, 
comment_desc, comment_date, commentor_name, access_id
); END $$


#Procedure 9: inserts location
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_locations`(
IN loc_id varchar(20),IN post_id varchar(20), 
IN lname varchar(100),In description varchar(255),
IN latitude varchar(30), IN longitude varchar(30),
IN access_id varchar(5)
) 
BEGIN insert into location
(
loc_id, post_id,name,description, latitude,longitude,access_id
)
values ( 
loc_id,post_id,lname,
description,latitude,longitude,access_id
); END $$

#Procedure 10:inserts likes
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_likes`(
IN p_like_id varchar(20),IN post_id varchar(30),IN p_multimedia_id varchar(10), 
IN p_comment_id varchar(20), IN p_loc_id varchar(20),
IN p_viewer varchar(20), IN p_like_time datetime
)
BEGIN insert into likes ( 
like_id, post_id,
multimedia_id,comment_id,loc_id,
viewer_name,like_time
) values 
(
p_like_id,post_id,p_multimedia_id,
p_comment_id,p_loc_id,
p_viewer,p_like_time
); END $$


#Procedure 11: Read from registered employee table
CREATE DEFINER=`root`@`localhost` PROCEDURE `registered_employee_acc`() 
BEGIN select * from registered_employee;
END $$



#Procedure 12 :Read posts
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_posts`() 
BEGIN select * from post;
END $$

 
#Procedure 13 : Read wall
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_wall`() 
BEGIN select * from wall;
END $$
 
#Procedure 14: Read relationships
CREATE DEFINER=`root`@`localhost` PROCEDURE `view_relationship`() 
BEGIN select * from relationship;
END $$


#Procedure 15: View Multimedia Contents
CREATE DEFINER=`root`@`localhost` PROCEDURE `multimedia_contents`() 
BEGIN select * from multimedia_content;
END $$

#Procedure 16
CREATE DEFINER=`root`@`localhost` PROCEDURE `comment`() 
BEGIN select * from comment;
END $$ 

#Procedure 17: View Location
CREATE DEFINER=`root`@`localhost` PROCEDURE `location`() 
BEGIN select * from location;
END $$

# Procedure 18: View likes 
CREATE DEFINER=`root`@`localhost` PROCEDURE `likes`() 
BEGIN select * from likes;
END $$


#Procedure 19: View employee table
CREATE DEFINER=`root`@`localhost` PROCEDURE `employee_acc`() 
BEGIN select * from employee;
END $$

#Procedure 20: View sign_in  table
CREATE DEFINER=`root`@`localhost` PROCEDURE `employee_signin`() 
BEGIN select * from signin;
END $$


DELIMITER ;




