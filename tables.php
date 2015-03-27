<?php
$con = mysqli_connect("127.0.0.1","root","","dbmsproject");
if(mysqli_connect_errno())
{
echo "failed to connect to mysql: " . mysqli_connect_error ();
echo "error exist";
}
else
{
echo "connected successfully " . "<br>";
}
$mem="create table member 
(name varchar(20),user_id varchar(20)
,passwd varchar(20),phone_no varchar(20),sex varchar(20),
join_date date,address varchar(50),email_id varchar(20),
isbn1 varchar(20),isbn2 varchar(20),post varchar(20),
primary key(user_id),unique(email_id))";
if(mysqli_query($con,$mem))
{
echo "table member created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>";
}
$student="create table student
(primary key(roll_no),stream varchar(20),
roll_no varchar(20),student_id varchar(20),
foreign key(student_id) references member(user_id))";
if(mysqli_query($con,$student))
{
echo "table student created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$faculty="create table faculty
(emp_id varchar(20),course varchar(20),faculty_id varchar(20),primary key(emp_id),
foreign key (faculty_id) references member(user_id)
)";
if(mysqli_query($con,$faculty))
{
echo "table faculty created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$libr="create table librarian
(emp_id varchar(20),user_id varchar(20),primary key(emp_id),foreign key(user_id) references member(user_id))";
if(mysqli_query($con,$libr))
{
echo "table librarian created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$stoc="create table stock
(lid varchar(20),user_id varchar(20),issue_date date,price int,status int,categary varchar(20),primary key(lid)
,foreign key(user_id) references member(user_id))";
if(mysqli_query($con,$stoc))
{
echo "table stock created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$book="create table book
(title varchar(30),isbn varchar(20),publication varchar(20),publication_year int,author varchar(20)
,lib_id varchar(20),primary key(isbn),foreign key(lib_id) references stock(lid))";
if(mysqli_query($con,$book))
{
echo "table book created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$ebook="create table ebook
(title varchar(30),isbn varchar(20),publication varchar(20),publication_year int,author varchar(20),
lib_id varchar(20),primary key(isbn),foreign key(lib_id) references stock(lid))";
if(mysqli_query($con,$ebook))
{
echo "table ebook created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$magazines="create table magazines
(title varchar(30),isbn varchar(20),publication varchar(20),publication_year int,
author varchar(20),lib_id varchar(20),primary key(isbn),foreign key(lib_id) references stock(lid))";
if(mysqli_query($con,$magazines))
{
echo "table magazines created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$journals="create table journals
(title varchar(30),isbn varchar(20),publication varchar(20),publication_year int,author varchar(20),
lib_id varchar(20),primary key(isbn),foreign key(lib_id) references stock(lid))";
if(mysqli_query($con,$journals))
{
echo "table journals created successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$tab1="alter table member
add foreign key (isbn1) references stock(lid)";
if(mysqli_query($con,$tab1))
{
echo "foreign key added to member table successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}
$tab2="alter table member
add foreign key (isbn2) references stock(lid)";
if(mysqli_query($con,$tab2))
{
echo "foreign key added to member table successfully " . "<br>";
}
else
{
echo "error creating table:" . "<br>" ;
}


?>