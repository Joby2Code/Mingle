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



call insert_employee(1111111111,'test@nyu.edu');



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
where profile_name = 'jj2196' or profile_name in 
(select distinct receiver_name from relationship
where sender_name = 'jj2196' and friendship_status = 'Accepted' or friendship_status = 'sent' and relation_type = 'T' or 'F');

select distinct receiver_name from relationship
where sender_name = 'jj2196' and friendship_status = 'Accepted' or friendship_status = 'sent' and relation_type = 'T' or 'F';

select * from relationship;

select * from post;



SELECT * FROM comment WHERE post_id='post_1';

select count(distinct like_id) as tot_likes from likes where post_id='post_1';

select count(distinct like_id) as tot_likes,viewer_name from likes where post_id='post_1' group by viewer_name;


select * from likes;


INSERT INTO likes VALUES('like_11','post_1',null,null,null,'jj2196',' 2018-02-02 09:10:30');
