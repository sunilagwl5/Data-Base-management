<?php

session_name("signupform");
session_start();
$str='';
if(isset($_SESSION['errStr']))
{
	$str='<div class="error">'.$_SESSION['errStr'].'</div>';
	unset($_SESSION['errStr']);
}

$success='';
if(isset($_SESSION['sent']))
{
	$success='<h1>Thank you!</h1>';
	
	$css='<style type="text/css">#contact-form{display:none;}</style>';
	
	unset($_SESSION['sent']);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<title>Sign UP Portal</title>

<link rel="stylesheet" type="text/css" href="jqtransformplugin/jqtransform.css" />
<link rel="stylesheet" type="text/css" href="formValidator/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />



<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js"></script>
<script type="text/javascript" src="formValidator/jquery.validationEngine.js"></script>

<script type="text/javascript" src="script.js"></script>
<script>
function favbrowser()
{
var mylist=document.getElementById("desig");
var list=document.getElementById("desig").selectedIndex;
alert(list);
}
function showmenu(elmnt)
{
document.getElementById(elmnt).style.visibility="visible";
}
function hidemenu(elmnt)
{
document.getElementById(elmnt).style.visibility="hidden";
}
var parent=document.getElementById("form-container");
var child=document.getElementById("contact-form");
parent.removeChild(child);
</script>

</head>

<body>

<div id="main-container">

	<div id="form-container">
    <h1>Membership Form</h1>
    
    <form id="contact" name="contact" method="post" action="submit.php" >
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
		<tr>
          <td><label for="username">Username</label></td>
          <td><input type="text" class="validate[required]" name="username" id="username" value="" ></td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td><label for="passwd">Password</label></td>
          <td><input type="password" class="validate[required]" name="passwd" id="passwd" value="" ></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="10%"><label for="name">Name</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="name" id="name" value="" ></td>
          <td width="10%" id="errOffset">&nbsp;</td>
		  </tr>
        <tr>
          <td><label for="phone">Phone No.</label></td>
          <td><input type="text" class="validate[required,custom[telephone]]" name="phone" id="phone" value="" ></td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td><label for="email">Email</label></td>
          <td><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="" ></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="gender">Gender</label></td>
          <td><select name="gender" id="gender">
            <option value="" selected="selected"> - Gender -</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td valign="top"><label for="address">Address</label></td>
          <td><textarea name="address" id="address" class="validate[required]" cols="45" rows="4"></textarea></td>
          <td valign="top">&nbsp;</td>
        </tr>
		<tr>
          <td><label for="desig">Designation</label></td>
          <td><select name="desig" id="desig" ">
            <option value="" selected="selected"> - Designation -</option>
            <option value="student" >Student</option>
            <option value="prof">Faculty</option>
			<option value="libr">Librarian</option>
          </select>          
		  </td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td></td>
		  <td>
          <select name="branch" id="branch">
            <option value="" selected="selected"> - Branch -</option>
            <option value="cse">Computer Science and Engineering</option>
            <option value="ece">Electonics and Communication Engineering</option>
			<option value="cce">Computer and Communication Engineering</option>
          </select>          
		  </td>
		  </tr>
		  <tr >
		  <td><label for="rollno">Roll No<br>(If Student).</label></td>
          <td><input type="text" class="validate[custom[noSpecialCaracters]]" name="rollno" id="rollno" value="" ></td>
          <td>&nbsp;</td>
          </tr>
		
        <tr>
          <td><label for="empid1">Employee Id<br>(If Professor)</label></td>
          <td><input type="text" class="validate[custom[noSpecialCaracters]]" name="empid1" id="empid1" value="" /></td>
          <td>&nbsp;</td>
		 </tr>
		 <tr>
		  <td><label for="course">Course Undertaken<br>(If Professor)</label></td>
          <td><input type="text" class="validate[custom[noSpecialCaracters]]" name="course" id="course" value="" ></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td><label for="empid2">Employee Id<br>(If Librarian)</label></td>
          <td><input type="text" class="validate[custom[noSpecialCaracters]]" name="empid2" id="empid2" value="" ></td>
          <td>&nbsp;</td>
		 </tr>
		 
        <tr>
          <td valign="top">&nbsp;</td>
          <td colspan="2"><input type="submit" name="button" id="button" value="Submit" />
          <input type="reset" name="button2" id="button2" value="Reset" ></td>
		  <img id="loading" src="img/ajax-load.gif" width="16" height="16" alt="loading" /
        </tr>
		
      </table>
      </form>
      
    </div>
	

</body>
</html>
