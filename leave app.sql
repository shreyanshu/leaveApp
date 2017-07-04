create database LeaveApp;

use LeaveApp;

create table student
(
	id int primary key auto_increment,
	username varchar(200),
	firstName varchar(200),
	lastName varchar(200),
	batch varchar(40),
	section char(3),
	rollNo int,
	contactNo varchar(30),
	password varchar(200),
	status varchar(200)
);

create table admin
(
	id int primary key auto_increment, 
	username varchar(200),
	password varchar(200)
);

create table leaveData
(
	name varchar(200),	
	startDate varchar(200),
	endDate varchar(200),
	reason varchar(400),
	id int primary key auto_increment,
	Sid int references student(id),
	status varchar(200)
);

select * from student;

insert into admin(username,password) values ("admin","admin");