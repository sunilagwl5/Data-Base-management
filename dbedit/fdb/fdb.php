<?php
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  session_start();
  if(!(isset($_SESSION['username'])))
  {
  	echo "You must log in first";
	die ('<a href="../index.html">Please click here to go back</a>');
	
  }
  
 if(!isset($_SESSION['name']))
		header('location:../../librarian.php');
	
  $result = mysqli_query($con,"SELECT * FROM member m,faculty f 
  WHERE m.user_id=f.faculty_id and m.name like '%$_SESSION[name]%'");
  
echo '<div id="container">
	<h1>Faculty Database</h1>
		<div id="content">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Name</th>
				<th>User Id</th>
				<th>Password</th>
				<th>Email Id</th>
				<th>Employee ID.</th>
				<th>Course Undertaken</th>
				<th>Gender</th>
				<th>Join Date</th>
				<th>Phone No.</th>
				<th>Books Issued</th>
			</tr>';
		
	while($row = mysqli_fetch_array($result))
	{
		
		if(empty($row['isbn1']))
			$isbn1= " ";
		else
	  		$isbn1=$row['isbn1'];
	  
		if(empty($row['isbn2']))
			$isbn2= " ";
		else
	  		$isbn2=', ' .$row['isbn2'];
			
			echo '<tr>
				<td>'.$row['name'].'</td>
				<td>'. $row['user_id'] .'</td>
				<td>'. $row['passwd'] .'</td>
				<td>'. $row['email_id'] .'</td>
				<td>'. $row['emp_id'] .'</td>
				<td>'. $row['course'] .'</td>
				<td>'. $row['sex'] .'</td>
				<td>'. $row['join_date'] .'</td>
				<td>'. $row['phone_no'] .'</td>
				<td>'. $isbn1 .''. $isbn2 .'</td>
				
			</tr>';		
		
	}
  echo '</table>		
	</div>
	</div>';

	
 
		
		
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Faculty Databse</title>


<link href="db/stockdb.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="db/stockdb.js"></script>
<!-- end -->

<style>

body{
	margin:0;
	padding:0;
	background:#f1f1f1;
	font:100% Arial, Helvetica, sans-serif; 
	color:#555;
	line-height:150%;
	text-align:left;
}
a{
	text-decoration:none;
	color:#057fac;
}
a:hover{
	text-decoration:none;
	color:#999;
}
h1{
	font-size:140%;
	margin:0 20px;
	line-height:80px;	
}
h2{
	font-size:120%;
}
#container{
	margin:0 auto;
	width:1200px;
	background:#fff;
	padding-bottom:20px;
}
#content{margin:0 20px;}
p.sig{	
	margin:0 auto;
	width:680px;
	padding:1em 0;
}
form{
	margin:1em 0;
	padding:.2em 20px;
	background:#eee;
}
</style>

</head>

<body>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 <button onclick="location.href = '../../librarian.php';">Back</button>
<h1></h1><form name="form2" method="POST" action="../issue.php">


<form name="form2" method="POST" action="facultyedit.php">
<p style="text-align: center">
								
   <label for="name">Enter the User Id to Edit: </label>
      <input id="userid" name="userid" />
<button type="submit" name="submit1">Edit</button></p>
</form>

<form name="form2" method="POST" action="facultydelete.php">
                           
<p style="text-align: center">
								
   <label for="name">Enter the User Id to Delete:  </label>
      <input id="userid" name="userid" />
<button type="submit" name="submit2">Delete</button></p>
</form>
</p>
</h1>
	
	
</body>
</html>
