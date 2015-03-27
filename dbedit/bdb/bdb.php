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
  	header('Refresh: 1;url=index.php');
  	die('You must login First as librarian');
	
  }
  
 if(!isset($_SESSION['name']))
	{
				header('Refresh: 1;url=index.php');
  	die('You must login First as librarian');}
	
$category="Book";
	$result = mysqli_query($con,"SELECT * FROM book b,stock s 
	WHERE b.lib_id=s.lid and b.title like '%$_SESSION[name]%' ");
  
echo '<div id="container">
	<h1>' .$category. ' Database</h1>
		<div id="content">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Title</th>
				<th>ISBN</th>
				<th>Publication</th>
				<th>Publication Year</th>
				<th>Author</th>
				<th>lid</th>
				<th>Price</th>
				<th>Status</th>
				<th>Category</th>
				
			</tr>';
		
	while($row = mysqli_fetch_array($result))
	{
		if($row['status']==0)
		{
			$status="Available";
			$link='<a href="issue.php">Issue</a>';
		}
		else
		{
			$status="Not Availabale";
			$link="Cannot Issue";
		}
	
		echo '<tr>
				<td>'.$row['title'].'</td>
				<td>'. $row['isbn'] .'</td>
				<td>'. $row['publication'] .'</td>
				<td>'. $row['publication_year'] .'</td>
				<td>'. $row['author'] .'</td>
				<td>'. $row['lid'] .'</td>
				<td>'. $row['price'] .'</td>
				<td>'. $status .'</td>
				<td>'. $category .'</td>
				
			</tr>';			
	}
  
  
  echo '</table>		
	</div>
	</div>';

	
 
		
		
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Book Databse</title>


<link href="db/stockdb.css" rel="stylesheet" type="text/css" media="screen" />

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

<form name="form2" method="POST" action="bookedit.php">
<p style="text-align: center">
								
   <label for="name">Enter the Library Id to Edit: </label>
      <input id="lid" name="lid" />
<button type="submit" name="submit1">Edit</button></p>
</form>

<form name="form2" method="POST" action="bookdelete.php">
                           
<p style="text-align: center">
								
   <label for="name">Enter the Library Id to Delete:  </label>
      <input id="lid" name="lid" />
<button type="submit" name="submit2">Delete</button></p>
</form>
	
	
</body>
</html>
