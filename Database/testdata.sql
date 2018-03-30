use Mingle;

call employee_acc_registration;

call insert_employee(742347663,'jj2196@nyu.edu');
call insert_employee(742347661,'gss383@nyu.edu');
call insert_employee(378092902,'pns234@nyu.edu');
call insert_employee(407840577,'akk198@nyu.edu');
call insert_employee(940237837,'ryk123@nyu.edu');
call insert_employee(379486342,'gpn967@nyu.edu');


call insert_signin_details(742347663,'password');
call insert_signin_details(742347661,'password');
call insert_signin_details(378092902,'password');
call insert_signin_details(407840577,'password');
call insert_signin_details(940237837,'password');
call insert_signin_details(379486342,'password');

call insert_registered_employee('jj2196',742347663,'Joby','Joy','New York','Senior Engineer','Java Php','Dancing','Karl','A','jj2196@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Male','S');
call insert_registered_employee('gss383',742347661,'Gauri','Sarode','New York','Senior Engineer','Python Php','Movies','Karl','A','gss383@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Female','P');
call insert_registered_employee('pns234',378092902,'Pranav','Reddy','Bayridge','Data Engineer','Java React','Mingling','Gauri','B','pns23@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Male','S');
call insert_registered_employee('akk198',407840577,'Arun','Kondani','Manhattan','Website developer','Python React','Cribbing','Gauri','B','akk198@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Male','P');
call insert_registered_employee('ryk123',940237837,'Rahul','Keswani','Long Island','Data Scientist','React Php','Coding','Pranav','C','ryk123@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Male','S');
call insert_registered_employee('gpn967',379486342,'Geetesh','Nikhade','Boston','Full stack developer','Python Java','Drinking','Pranav','C','gpn967@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Male','P');


call insert_post('post_1','2010-07-22 22:30:12','First post','Day one it is!',' ');
call insert_post('post_2','2010-08-01 13:30:32','Second post','Some day it is!',' ');
call insert_post('post_3','2010-08-10 20:30:17','Third post','Not just another it is!',' ');
call insert_post('post_4','2010-09-20 04:30:29','Fourth post','So much work such little time!',' ');
call insert_post('post_5','2010-09-22 12:30:30','Fifth post','In the intense meeting discussion!',' ');
call insert_post('post_6','2010-10-02 12:20:43','Sixth post','Had the best curly fries ever!',' ');

call add_to_wall('post_1','jj2196');
call add_to_wall('post_2','gss383');
call add_to_wall('post_3','jj2196');
call add_to_wall('post_4','gss383');
call add_to_wall('post_5','gss383');
call add_to_wall('post_6','ryk123');

call insert_relationship('jj2196','gss383','T','2010-07-22 22:30:12','Accepted');
call insert_relationship('jj2196','ryk123','T','2012-07-22 22:30:12','Sent');
call insert_relationship('jj2196','akk198','F','2013-07-22 22:30:12','Declined');
call insert_relationship('jj2196','pns234','F','2010-07-22 22:30:12','Accepted');
call insert_relationship('gss383','pns234','T','2010-07-22 22:30:12','Accepted');
call insert_relationship('ryk123','gss383','T','2010-07-22 22:30:12','Sent');

call insert_multimedia('mul_1','post_1','Miami Image','jpg',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','S');
call insert_multimedia('mul_2','post_2','Florida image','jpg',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','P');
call insert_multimedia('mul_3','post_1','Sunset beach','jpg',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','F');
call insert_multimedia('mul_4','post_3','Curly fries','jpg',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','S');
call insert_multimedia('mul_5','post_1','Miami Image','jpg',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','P');

call insert_comments('cmnt_1','post_3','So cool!','2010-07-22 22:30:12','gss383','P');
call insert_comments('cmnt_2','post_4','Let me join in','2010-09-21 04:30:29','ryk123','F');
call insert_comments('cmnt_3','post_5','Where is this!','2010-09-22 15:30:30','ryk123','F');
call insert_comments('cmnt_4','post_5','How does this work?','2010-09-23 12:30:302','gpn967','P');
call insert_comments('cmnt_5','post_5','Nice post man','2010-09-24 22:30:30','jj2196','P');
call insert_comments('cmnt_6','post_2','Isnt it there already?','2010-09-25 12:30:30','jj2196','F');
call insert_comments('cmnt_7','post_1','How was your conference?','2010-09-23 12:30:30','gpn967','P');
call insert_comments('cmnt_8','post_1','Its good to see you here. We should meet','2010-09-24 22:30:30','jj2196','P');
call insert_comments('cmnt_9','post_1','When is the conference?','2010-09-25 12:30:30','gss383','P');

call insert_locations('loc_1','post_1','Miami Convention Center','Conference on AI for next generations','40.7587° N', '73.9787° W','P');
call insert_locations('loc_2','post_2','Wall Street','Meeting for a tender passing','42.7217° N', '34.9787° W','F');
call insert_locations('loc_3','post_3','Bobst Washington people','Conference for product deployment','78.7587° S', '13.9787° E','P');
call insert_locations('loc_4','post_4','Android robotic palace','Making aurduino work','30.7587° E', '23.9787° S','F');

call insert_likes('like_1','post_1','mul_1','cmnt_1',NULL,'gss383','2010-07-22 22:30:12');
call insert_likes('like_2','post_2','mul_1','cmnt_1',NULL,'akk198','2010-08-12 16:45:45');
call insert_likes('like_3','post_1','mul_1','cmnt_1',NULL,'akk198','2010-09-14 18:20:23');
call insert_likes('like_4','post_2','mul_1','cmnt_1',NULL,'pns234','2010-09-22 19:35:19');
call insert_likes('like_5','post_2','mul_2','cmnt_1',NULL,'pns234','2010-09-22 19:35:19');
call insert_likes('like_6','post_3',NULL,NULL,NULL,'pns234','2010-09-22 19:35:19');
call insert_likes('like_7','post_2','mul_2','cmnt_2',NULL,'pns234','2010-09-22 19:35:19');
call insert_likes('like_8','post_2','mul_1',NULL,NULL,'pns234','2010-09-22 19:35:19');
call insert_likes('like_9','post_4','mul_1',NULL,NULL,'pns234','2010-09-22 19:35:19');
call insert_likes('like_10','post_2','mul_3','cmnt_1',NULL,'pns234','2010-09-22 19:35:19');


#----------Testing------
call employee_acc;
call employee_signin;
call  registered_employee_acc;
call read_posts;
call  read_wall;
call  view_relationship;
call  multimedia_contents;
call  comment;
call  location;
call likes;

select validate_user(742347663) as Status;


#--- Update Table:

call update_post_table('post_1','2018-03-26 22:30:12','P');