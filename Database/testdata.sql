use Mingle;

call employee_acc_registration;

call insert_employee(742347663,'jj2196@nyu.edu');
call insert_employee(742347661,'gss383@nyu.edu');

call insert_signin_details(742347663,'password');
call insert_signin_details(742347661,'password');

call insert_registered_employee('jj2196',742347663,'Joby','Joy','New York','Senior Engineer','Java Php','Dancing','Karl','A','jj2196@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Male','S');
call insert_registered_employee('gss383',742347661,'Gauri','Sarode','New York','Senior Engineer','Python Php','Movies','Karl','A','gss383@nyu.edu',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','Female','P');

call insert_post('post_1','2010-07-22 22:30:12','First post','Day one it is!',' ');

call add_to_wall('post_1','jj2196');

call insert_relationship('jj2196','gss383','T','2010-07-22 22:30:12','Accepted');

call insert_multimedia('mul_1','post_1','Miami Image','jpg',x'C9CBBBCCCEB9C8CABCCCCEB9C9CBBB','S');

call insert_comments('cmnt_1','post_1','So cool!','2010-07-22 22:30:12','gss383','P');

call insert_locations('loc_1','post_1','Miami Convention Center','Conference on AI for next generations','40.7587° N', '73.9787° W','P');


call insert_likes('like_1','post_1','mul_1','cmnt_1',NULL,'gss383','2010-07-22 22:30:12');


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



#--- Update Table:

call update_post_table('post_1','2018-03-26 22:30:12','P');