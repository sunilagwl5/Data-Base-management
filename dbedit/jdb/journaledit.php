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
	$result = mysqli_query($con,"SELECT * FROM stock s,journals b WHERE s.lid=b.lib_id and s.lid='$_POST[lid]'");
  $row=mysqli_fetch_array($result);
		$type="Journal info";
	$_SESSION['lid1']=$_POST['lid'];
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Stock Entry</title>


<link rel="stylesheet" type="text/css" media="all" href="db/stock.css" />
</head>

<body>
<h1>Logged in by- <br><br><?php echo $row1['name'];?> </h1>
<div id="container">
<form action="submit.php" method="post" class="niceform">
	<fieldset>
    	<legend><?php echo $type;?></legend>
        <dl>
        	<dt><label for="lid">Library No. :</label></dt>
            <dd><label for="lid"><?php echo $row['lid'];?> </label></dd>
        </dl>
        <dl>
        	<dt><label for="title">Tilte :</label></dt>
            <dd><input type="text" name="title" id="title" size="32" maxlength="32" value="<?php echo $row['title'];?>"/></dd>
        </dl>
		<dl>
        	<dt><label for="author">Author :</label></dt>
            <dd><input type="text" name="author" id="author" size="32" maxlength="128" value="<?php echo $row['author'];?>" /></dd>
        </dl>
        <dl>
        	<dt><label for="pub">Publication :</label></dt>
            <dd><input type="text" name="pub" id="pub" size="32" maxlength="128" value="<?php echo $row['publication'];?>"/></dd>
        </dl>
		 <dl>
        	<dt><label for="pubyear">Publication Year :</label></dt>
            <dd><input type="text" name="pubyear" id="pubyear" size="32" maxlength="16" 
			value="<?php echo $row['publication_year'];?>"/></dd>
        </dl>
		 <dl>
        	<dt><label for="isbn">ISBN :</label></dt>
            <dd><input type="text" name="isbn" id="isbn" size="32" maxlength="16" value="<?php echo $row['isbn'];?>"/></dd>
        </dl>
		 <dl>
        	<dt><label for="price">Price :</label></dt>
            <dd><input type="text" name="price" id="price" size="32" maxlength="10" value="<?php echo $row['price'];?>"/></dd>
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
