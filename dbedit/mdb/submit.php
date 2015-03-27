<?php
// making an connection  
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
  if(!(isset($_SESSION['username'])))
  {
  	header('Refresh: 1;url=index.php');
  	die('You must login First as librarian');
  }
  $username=$_SESSION['username'];
  $result1 = mysqli_query($con,"SELECT * FROM member WHERE user_id='$username'");
  $row1=mysqli_fetch_array($result1);
  if(!($row1['post']==3))
  {
  	header('Refresh: 1;url=index.php');
  	die('You must login First as librarian');
	
	}
	
 mysqli_query($con,"UPDATE stock SET price='$_POST[price]'
		WHERE lid='$_SESSION[lid1]'");

 mysqli_query($con,"UPDATE magazines SET title='$_POST[title]', author='$_POST[author]',
  publication='$_POST[pub]',publication_year='$_POST[pubyear]',isbn='$_POST[isbn]'
		WHERE lib_id='$_SESSION[lid1]'");
header('Refresh: 1;url=index.php');
  	
?>