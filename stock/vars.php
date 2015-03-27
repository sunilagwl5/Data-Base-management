<?php
// making an connection  
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
  if(!isset($_SESSION['catgry']))
  {
  	die('You must login First <a href="../index.html">Back</a>');
  }
  echo $_SESSION['catgry'];
	$catgry=$_SESSION['catgry'];
//inserting data in table
$status=0;
$sql="INSERT INTO stock (lid,price,category,status) VALUES ('$_POST[lid]','$_POST[price]',$catgry,$status)";
if (!mysqli_query($con,$sql))
  {
  die('Error: ');
  }
echo "touple inserted in members successfully";
if($catgry=='1')
{
	echo "i am in book";
	$sql1="INSERT INTO book (title,isbn,publication,publication_year,author,lib_id) VALUES ('$_POST[title]','$_POST[isbn]','$_POST[pub]','$_POST[pubyear]','$_POST[author]','$_POST[lid]')";
}

if($catgry=='3')
{
	echo "i am in 3--  ";
	$sql1="INSERT INTO journals (title,isbn,publication,publication_year,author,lib_id) VALUES ('$_POST[title]','$_POST[isbn]','$_POST[pub]','$_POST[pubyear]','$_POST[author]','$_POST[lid]')";
}

if($catgry=='4')
{
	echo "i am in 4--  ";
	$sql1="INSERT INTO magazines (title,isbn,publication,publication_year,author,lib_id) VALUES ('$_POST[title]','$_POST[isbn]','$_POST[pub]','$_POST[pubyear]','$_POST[author]','$_POST[lid]')";
}

if (!mysqli_query($con,$sql1))
  {
  die('Error: ');
  }
echo "touple inserted in members successfully in category";
echo '<br><a href="stock.php">Click here</a> to insert more.';
echo '<br><a href="..\librarian.php">Click here</a> to return.';

mysqli_close($con);
?>

