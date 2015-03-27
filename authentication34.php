<?php
// making an connection  
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
	$_SESSION['username']=$_POST['userid'];
	echo "databse connected";
	$myusername=$_POST['userid']; 
	$mypassword=$_POST['password'];
	echo $_POST['userid'];
	echo $_POST['password'];
	
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	
	
	//$sql="SELECT * FROM member WHERE user_id='$myusername' and passwd='$mypassword'";
$result=mysqli_query($con,"SELECT * FROM member WHERE user_id='$myusername' and passwd='$mypassword'");

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
echo "login successful";
header('Location:student/student.php');
}
else {
echo "Wrong Username or Password";
}
mysqli_close($con);
?>