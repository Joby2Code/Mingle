use Mingle;
select * from signin
 where ssn = 742347663 and password='password';

ALTER TABLE registered_employee DROP COLUMN ssn;

SET FOREIGN_KEY_CHECKS=1;

SHOW ENGINE INNODB STATUS;



ALTER TABLE registered_employee
ADD COLUMN profile_created date AFTER access_id;


select * 
from signin
where ssn = jj2196 or profile_name = 'jj2196' and password='password';



DELETE FROM signin
WHERE ssn = 1111111111 ;

delete from employee
where ssn = 1111111111;


delete from registered_employee
where profile_name = 'test';



call insert_employee(999999999,'jj2197@nyu.edu');



select * from signin where profile_name = 'test' and password = '123' ;


SELECT * 
FROM registered_employee
where profile_name like 'jj2196%' or first_name='jj2196' or last_name='jj2196';


select *
from registered_employee
where first_name='Joby' and last_name='Joy';

select * from wall;

#Query selects all the post to be displayed on the wall of the user and his friends
select * from wall
where profile_name = 'jj2196' and deleted ='no' or profile_name in 
(select distinct receiver_name from relationship
where sender_name = 'jj2196' and friendship_status = 'Accepted' or friendship_status = 'sent' and relation_type = 'T' or 'F') and deleted='no';

select distinct receiver_name from relationship
where sender_name = 'jj2196' and friendship_status = 'Accepted' or friendship_status = 'sent' and relation_type = 'T' or 'F';

select * from relationship;

select * from post;

UPDATE wall SET deleted='yes' WHERE post_id='post_1';


SELECT * FROM comment WHERE post_id='post_1';

select count(distinct like_id) as tot_likes from likes where post_id='post_1';

select count(distinct like_id) as tot_likes,viewer_name from likes where post_id='post_1' group by viewer_name;


select * from likes;
select * from wall;

INSERT INTO likes VALUES('like_11','post_1',null,null,null,'jj2196',' 2018-02-02 09:10:30');


ALTER TABLE wall
ADD deleted varchar(30) default 'no';


ALTER TABLE post
DROP COLUMN deleted;


ALTER TABLE comment
ADD deleted varchar(30) default 'no';



ALTER TABLE multimedia_content
ADD deleted varchar(30) default 'no';

SELECT * FROM comment WHERE post_id='post_2' and (access_id = 'P' or access_id= 'F') and deleted='no' ORDER BY comment_date ASC;


SELECT * FROM comment WHERE post_id='post_2';



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



SELECT * FROM  multimedia_content WHERE post_id='post_17';