
<?php

/* config start */
/* config end */
// making an connection  
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
echo "connected successfully " . "<br>";
}
  
//require "phpmailer/class.phpmailer.php";

session_name("signupform");
session_start();
if (!isset($_POST['button']))
{
	die('You must login First <a href="../index.html">Back</a>');
}

$err = array();


if(count($err))
{
	if($_POST['ajax'])
	{
		echo '-1';
	}

	else if($_SERVER['HTTP_REFERER'])
	{
		$_SESSION['errStr'] = implode('<br />',$err);
		$_SESSION['post']=$_POST;
		
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	exit;
}
	$desg=$_POST['desig'];
$d1="student";
$d2="prof";
$d3="libr";
$deg;

if(!( strcmp($d1,$desg))) {
echo "yes i got it,1 \n"; $deg=1;
}
if(!( strcmp($d2,$desg))) {
echo "yes i got it,2"; $deg=2;
}
if(!( strcmp($d3,$desg))) {
echo "yes i got it, 3"; $deg=3;
}
//inserting data in table


//$sql="INSERT INTO member (name,user_id,passwd,phone_no,sex,join_date,address,email_id,post) VALUES ('$_POST['name']','$_POST['username']','$_POST['passwd']','$_POST['phone']','$_POST['gender']','CURDATE()','$_POST['address']','$_POST['email']',$deg)";
echo "---- ".$deg."---";
if (!mysqli_query($con,"INSERT INTO member (name,user_id,passwd,phone_no,sex,join_date,address,email_id,post) VALUES ('$_POST[name]','$_POST[username]','$_POST[passwd]','$_POST[phone]','$_POST[gender]','CURDATE()','$_POST[address]','$_POST[email]',$deg)"))
  {
  die('/n Error: not added members');
  }
  else
echo "Your Form is sent for approval, we will contact you shortly.";
if(!(strcmp($d1,$desg)))
{
	echo "Enterd in students";
	$sql1="INSERT INTO student (stream,roll_no,student_id) VALUES ('$_POST[branch]','$_POST[rollno]','$_POST[username]')";
	
	if (!(mysqli_query($con,$sql1)))
	{
	die('\n Error: not added in student');
	}
	else
		echo "successful";
	
}
else
	echo "not added in students";
if(!(strcmp($d2,$desg)))
{
	$sql2="INSERT INTO faculty (emp_id,course,faculty_id) VALUES ('$_POST[empid1]','$_POST[course]','$_POST[username]')";
	
	if (!mysqli_query($con,$sql2))
	{
	die('\n Error: not added in faculty');
	}
	else
		echo "successful";
	
}
else
	echo "\n not added in faculty";

if(!(strcmp($d3,$desg)))
{
	$sql3="INSERT INTO librarian (emp_id,user_id) VALUES ('$_POST[empid2]','$_POST[username]')";
	
	if (!mysqli_query($con,$sql3))
	{
	die('Error: not added in librarian');
	}
	else
		echo "successful";
}
else
	echo "\n not added in librarian";



unset($_SESSION['post']);

if($_POST['ajax'])
{
	echo '1';
}
else
{
	$_SESSION['sent']=1;
print '<script type="text/javascript">'; 
print 'alert("Not submitted")'; 
print '</script>';
	if($_SERVER['HTTP_REFERER'])
		header('Location: '.$_SERVER['HTTP_REFERER']);
	
	exit;
}



?>
