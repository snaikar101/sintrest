create table user (
user_id varchar(20) primary key,
fname varchar(20),
lname varchar(20),
email varchar(20),
password varchar(20),
created_date timestamp 
);

create table friend (
user_id varchar(20) references user(user_id),
friend_id varchar(20) references user(user_id),
requestsent_id varchar(20) references user(user_id),
request_status char(1),
request_udated_date timestamp,
primary key(user_id,friend_id)
);

create table picture(
picture_id int primary key,
source char(1),
url varchar(200),
tags varchar(100),
uploaded_by varchar(20) references user(user_id),
picture_path varchar(100)
);

create table pin(
pin_id int,
picture_id int references picture(picture_id),
parent_pin_id int references pin_id,
board_id int,
pinned_date timestamp,
primary key (pin_id,picture_id)
);

create table board(
board_id int primary key,
name varchar(20),
description text,
category varchar(20),
created_by varchar(20) references user(user_id),
created_date timestamp
);

create table follows(
user_id varchar(20) references user(user_id),
board_id int references board(board_id),
followed_date timestamp,
primary key (user_id,board_id)
);

create table likes(
user_id varchar(20) references user(user_id),
picture_id int references picture(picture_id),
liked_date timestamp,
primary key (user_id,picture_id)
);

create table comments(
user_id varchar(20) references user(user_id),
pin_id int references pin(pin_id),
comment_txt text,
commented_date timestamp,
primary key (user_id,pin_id)
);
