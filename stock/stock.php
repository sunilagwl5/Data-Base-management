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
  	die('You must login First');
	
  }
  $username=$_SESSION['username'];
  $result = mysqli_query($con,"SELECT * FROM member WHERE user_id='$username'");
  $row=mysqli_fetch_array($result);
  if(!($row['post']==3))
  {
  	
  	header('Refresh: 1;url=index.php');
  	die('You must login First');
	}
	if(!(isset($_SESSION['catgry'])))
  {
  	header('location:../librarian.php');
	}
	$catgry=$_SESSION['catgry'];
	if($catgry=='1')
		$type="Book info";
	else if($catgry=='3')
		$type="Jouranl info";
	else if($catgry=='4')
		$type="Magazine info";
	else
		$type="";
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Stock Entry</title>


<link rel="stylesheet" type="text/css" media="all" href="stock.css" />
</head>

<body>
<h1>Logged in by- <br><br><?php echo $row['name'];?> </h1>
<div id="container">
<form action="vars.php" method="post" class="niceform">
	<fieldset>
    	<legend><?php echo $type;?></legend>
        <dl>
        	<dt><label for="lid">Library No. :</label></dt>
            <dd><input type="text" name="lid" id="lid" size="32" maxlength="128" /></dd>
        </dl>
        <dl>
        	<dt><label for="title">Tilte :</label></dt>
            <dd><input type="text" name="title" id="title" size="32" maxlength="32" /></dd>
        </dl>
		<dl>
        	<dt><label for="author">Author :</label></dt>
            <dd><input type="text" name="author" id="author" size="32" maxlength="128" /></dd>
        </dl>
        <dl>
        	<dt><label for="pub">Publication :</label></dt>
            <dd><input type="text" name="pub" id="pub" size="32" maxlength="128" /></dd>
        </dl>
		 <dl>
        	<dt><label for="pubyear">Publication Year :</label></dt>
            <dd><input type="text" name="pubyear" id="pubyear" size="32" maxlength="16" /></dd>
        </dl>
		 <dl>
        	<dt><label for="isbn">ISBN :</label></dt>
            <dd><input type="text" name="isbn" id="isbn" size="32" maxlength="16" /></dd>
        </dl>
		 <dl>
        	<dt><label for="price">Price :</label></dt>
            <dd><input type="text" name="price" id="price" size="32" maxlength="10" /></dd>
        </dl>
		</fieldset>
		<fieldset class="action">
    	<input type="submit" name="submit" id="submit" value="Submit" /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<button type="button" onclick="location.href = '../librarian.php';">Go back</button>
    </fieldset>
	<	
</form>
</body>
</html>
