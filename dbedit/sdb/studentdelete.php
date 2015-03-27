<?php
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit2']))
{  
	if(!isset($_POST['userid']))
	{
		echo "Enter user id";
		die(' ');//header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	mysqli_query($con,"delete FROM student
	WHERE student_id='$_POST[userid]'");
	
	mysqli_query($con,"delete FROM member
	WHERE user_id='$_POST[userid]'");
	echo "member deleted succesfully";
	
	echo "student deleted succesfully";
	}
else
	echo "You must login as librarian";
	//header('Location: '.$_SERVER['HTTP_REFERER']);
	?>