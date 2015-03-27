<?php
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  session_start();
  if(!((isset($_SESSION['username']) || isset($_SESSION['activstu'])) ))
  {
  	header('Refresh: 1;url=index.php');
  	die('You must login First');
	
  }
  
  //if (isset($_POST['submit']))
{
  mysqli_query($con,"UPDATE member SET email_id='$_POST[email]', name='$_POST[Name]',
  passwd='$_POST[password]',phone_no='$_POST[phone]',address='$_POST[address]'
		WHERE user_id='$_SESSION[userid]'");
		
	mysqli_query($con,"UPDATE librarian SET emp_id='$_POST[Employee_Id]'
		WHERE emp_id='$_SESSION[userid]'");
}
//else
{
	//echo "quer done";
	header('Refresh: 1;url=index.php');
}