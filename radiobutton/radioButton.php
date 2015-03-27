<?php
if (isset($_POST['submit3']))
{  
	session_start();
	$_SESSION['catgry']=$_POST['choice'];
	$selected_radio = $_POST['choice'];
	
	if ($selected_radio == '1')
	{
	header('location:../stock/stock.php');
	}
	else if ($selected_radio == '2')
	{
	header('location:../ebook.html');
	}
	
	else if ($selected_radio == '3')
	{
	header('location:../stock/stock.php');
	}
	else if ($selected_radio == '4')
	{
	header('location:../stock/stock.php');
	}
	
}
else
	header('Location:index.html');
?>	