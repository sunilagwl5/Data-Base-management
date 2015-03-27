<?php
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit2']))
{  
	if(empty($_POST['lid']))
	{
		die('Enter Library id ');
		
		//header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	mysqli_query($con,"delete FROM magazines
	WHERE lib_id='$_POST[lid]'");
	
	mysqli_query($con,"delete FROM stock
	WHERE lid='$_POST[lid]'");
	echo "Magazine deleted succesfully";
	
	//echo "student deleted succesfully";
	}
else
	echo "Please login as librarian";
	//header('Location: '.$_SERVER['HTTP_REFERER']);
	?>