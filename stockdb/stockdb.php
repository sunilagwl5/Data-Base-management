<?php
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if (isset($_POST['submit1']))
{
	if(!isset($_POST['stock']))
	{
		die('You must login First <a href="index.php">Back</a>');
	}
	$selected_radio = $_POST['stock'];
	if ($selected_radio == '1')
		$category="Books";
	if ($selected_radio == '2')
		$category="E-Books";
	if ($selected_radio == '3')
		$category="Journals";
	if ($selected_radio == '4')
		$category="Magazines";
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
				<th>Issued By</th>
				 							
			</tr>';
	if ($selected_radio == '1')
	{
		$category="Books";
	$result = mysqli_query($con,"SELECT * FROM book b,stock s 
	WHERE b.lib_id=s.lid and b.title like '%$_POST[title]%' ");
	
	while($row = mysqli_fetch_array($result))
	{
		if($row['status']==0)
		{
			$status="Available";
			$link="No One";
		}
		else
		{
			$status="Not Availabale";
			$link=$row['user_id'];
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
				<td>'. $link .'</td>
			</tr>';			
	}
  
  }
  

	else if ($selected_radio == '2')
	{
		$result = mysqli_query($con,"SELECT * FROM ebook b,stock s 
		WHERE b.lib_id=s.lid and b.title like '%$_POST[title]%' ");
	}
	else if ($selected_radio == '3')
	{
		$category="Journals";
		$result = mysqli_query($con,"SELECT * FROM journals b,stock s 
		WHERE b.lib_id=s.lid and b.title like '%$_POST[title]%' ");
		
		while($row = mysqli_fetch_array($result))
	{
		if($row['status']==0)
		{
			$status="Available";
			$link="No One";
		}
		else
		{
			$status="Not Availabale";
			$link=$row['user_id'];
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
				<td>'. $link .'</td>
			</tr>';
	}
 }
 
 else if ($selected_radio == '4')
	{
		$category="Magazines";
		$result = mysqli_query($con,"SELECT * FROM magazines b,stock s 
		WHERE b.lib_id=s.lid and b.title like '%$_POST[title]%' ");
		
		while($row = mysqli_fetch_array($result))
	{
		if($row['status']==0)
		{
			$status="Available";
			$link="No One";
		}
		else
		{
			$status="Not Availabale";
			$link=$row['user_id'];
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
				<td>'. $link .'</td>
			</tr>';			
		
	}
 }
 echo '</table>		
	</div>
	</div>';
}		
		
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php echo $category ?> Databse</title>

<!-- paste this code into your webpage -->
<link href="db/stockdb.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="db/stockdb.js"></script>
<!-- end -->

<style>

body{
	margin:0;
	padding:0;
	background:#f1f1f1;
	font:110% Arial, Helvetica, sans-serif; 
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
	width:1090px;
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


<form name="form2" method="POST" action="../issue.php">
                           
<p style="text-align: center">
								
   <label for="name">Enter the LID: </label>
      <input id="lid" name="lid" />
<button type="submit" name="submit2">Issue</button></p>
</form>
	
	
</body>
</html>
