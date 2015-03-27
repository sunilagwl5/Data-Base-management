<?php
// making an connection  
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
  $myusername=$_SESSION['username'];
  if(!isset($_SESSION['username']))
  {
  	die('You Must Log in first to issue');
  }
  //$myusername=$_SESSION['username'];
  if(!isset($_POST['lid']))
  {
  	die('You Must Log in first to issue <a href="index.html">Back</a>');
  }
  $lid=$_POST['lid'];
  $result1=mysqli_query($con,"SELECT * FROM member WHERE user_id='$myusername'");
  $row1=mysqli_fetch_array($result1);
  $result2=mysqli_query($con,"SELECT * FROM stock WHERE lid='$lid'");
  $row2=mysqli_fetch_array($result2);
  if($row2['status']==1)
  	die('already issued, try another book');
  if((empty($row1['isbn1']))||(empty($row1['isbn2'])))
  {
  	mysqli_query($con,"UPDATE stock SET user_id='$myusername',issue_date=CURDATE(),status=1 
  	WHERE lid='$lid'");
  	
	if(empty($row1['isbn1']))
	  	mysqli_query($con,"UPDATE member SET isbn1='$lid'
		WHERE user_id='$myusername'");
	else
		mysqli_query($con,"UPDATE member SET isbn2='$lid'
		WHERE user_id='$myusername'");
  /*//$row=mysqli_fetch_array($result);
  
  //$result1=mysqli_query($con,"SELECT * FROM stock WHERE lid='$lid'");
  //$row1=mysqli_fetch_array($result1);
  */
  echo "everyhtinh fine";
  }
  else
  	echo "You have no Book Slot left";
?>