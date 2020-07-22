CREATE DATABASE `db_news_nikki` CHARACTER SET utf8 COLLATE utf8_general_ci;
use db_news_nikki;

CREATE TABLE user(
	user_id int PRIMARY KEY,
	name varchar(20),
	email varchar(50),
	password varchar(20),
	gender bit,
	birthday datetime,
	status bit,
	permission bit
)

create table categories(
	categories_id int PRIMARY key,
	name varchar(20),
	tag varchar(20),
	description varchar(100),
	slug varchar(20),
	active bit
)

 create table posts(
	post_id int PRIMARY key,
	categories_id int,
	title VARCHAR(100),
	intro VARCHAR(100),
	content text,
	tag varchar(20),
	description varchar(100),
	slug varchar(20),
	active bit,
	time datetime,
	status bit,
	user_id int	
 )
 alter table posts add CONSTRAINT PK_User_Posts_id FOREIGN key (user_id) REFERENCES user(user_id)
 
 create table images(
	image_id int PRIMARY key,
	url VARCHAR(255),
	post_id int
 )
 alter table images add CONSTRAINT PK_Posts_Images_id FOREIGN key (post_id) REFERENCES posts(post_id)
 
 CREATE table comments(
	comment_id int,
	user_id int,
	post_id int,
	content varchar(255),
	status bit,
	active bit,
	time datetime
 )
 alter table comments add constraint PK_user_Comments_id foreign key (user_id) REFERENCES user(user_id)
 alter table comments add constraint PK_Posts_Comments_id foreign key (post_id) REFERENCES posts(post_id)
 
 CREATE table contacts(
	contacts_id int,
	fullname varchar(20),
	email varchar(50),
	phone_number  varchar(20),
	title varchar(50),
	content text,
	status bit,
	active bit
 )
 INSERT into user VALUES (1,'admin','admin@gmail.com','admin',1,'1999-07-03',1,1),
													(2,'customer','customer@gmail.com','customer',0,'1999-07-03',1,0)
 
 INSERT into categories VALUES (1,'fashion','fashion','tin tuc noi ve cac the loai thoi trang moi nhat','tin tuc thoi trang moi nhat',1),
															 (2,'sport','sport','tin tuc noi ve cac dau the thao moi nhat','tin tuc the thao moi nhat',1)
 
 INSERT into posts VALUES (1,1,'Express recipes: Give a twist to your classic moong dal with this recipe','Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.','fashion',' voluptate velit esse cillum dolore eu fugiat nulla','voluptate velit esse cillum dolore eu fugiat nulla',1,'2020-05-05',1,2),
													(2,2,'A Closer Look At Our Front Porch Items From Lowe’s','Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese..','sport','This recipe is without any onions and garlic',' This recipe is without any onions and garlic',1,'2020-05-05',1,2)
													
INSERT into images VALUES (1,'image1',1),
													(2,'image2',1),
													(3,'image3',1),
													(4,'image4',2),
													(5,'image5',2),
													(6,'image6',2)
INSERT INTO comments values (1,2,1,'xin chao ban1',1,1,'2020-10-10'),
														(2,2,1,'xin chao ban2',1,1,'2020-10-10'),
														(3,2,2,'xin chao ban3',1,1,'2020-10-10'),
														(4,2,2,'xin chao ban4',1,1,'2020-10-10')

INSERT into contacts values (1,'nguyen van a','nguyenvana@gmail.com','0169857548','xin chao a','xin chao admin',1,1),
														(2,'nguyen van b','nguyenvanb@gmail.com','0169857548','xin chao b','xin chao admin',1,1),
														(3,'nguyen van c','nguyenvanc@gmail.com','0169857548','xin chao c','xin chao admin',1,1)
										

											
 
 
 
 
 
 