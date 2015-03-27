<?php
if (isset($_POST['submit4']))
{  
	session_start();
	$_SESSION['name']=$_POST['name'];
	
	$selected_radio = $_POST['edit'];
	
	if ($selected_radio == '1')
	{
	header('location:../dbedit/sdb/sdb.php');
	}
	else if ($selected_radio == '2')
	{
	header('location:../dbedit/fdb/fdb.php');
	}
	
	else if ($selected_radio == '3')
	{
	header('location:../dbedit/bdb/bdb.php');
	}
	else if ($selected_radio == '4')
	{
	header('location:../dbedit/jdb/jdb.php');
	}
	else if ($selected_radio == '5')
	{
	header('location:../dbedit/jdb/jdb.php');
	}
	else if ($selected_radio == '6')
	{
	header('location:../dbedit/mdb/mdb.php');
	}
	
	
}
else
	header('Location:index.html');
?>	