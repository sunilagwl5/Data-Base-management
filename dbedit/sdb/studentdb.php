<?php
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  session_start();
  if(!((isset($_SESSION['username']) || isset($_SESSION['activstu'])) ))
  {
  	header('Refresh: 1;url=index.php');
  	die('You must login First');
	
  }
  
	if(!isset($_SESSION['activlib']))
	{
		$result = mysqli_query($con,"SELECT * FROM member m,student s 
  WHERE m.user_id=s.student_id and m.user_id='$_SESSION[username]'");
  
  $row = mysqli_fetch_array($result);
  $_SESSION['userid']=$row['user_id'];
  }
  else
  {
  	$result = mysqli_query($con,"SELECT * FROM member m,student s 
  WHERE m.user_id=s.student_id and m.user_id='$_POST[userid]'");
  $row = mysqli_fetch_array($result);
  $_SESSION['userid']=$row['user_id'];
  }
  	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    
   

<style type="text/css">
form {
    width: 1000px;
}

.field {
    overflow: auto;
    padding: 0 0 0.5em;
}

label,
.checkbox p,
.radio p {
    padding: 0.2em 0 0;
    float: left;
    width: 180px;
}

input,
select {
    float: left;
    width: 160px;
}

select {
    width: 163px;
}

.error .messages,
.error .messages li {
    float: left;
    margin: 0;
    padding: 0;
    list-style: none;
}

.error .messages li {
    padding: 0.1em 0 0 1.5em;
    color: #b92d23;
}

.error input {
    color: #b92d23;
}

.success {
    background: url(/design/images/success_icon.png) 350px 0.2em no-repeat;
}

.error {
    background: url(/design/images/error_icon.png) 350px 0.2em no-repeat;
}

fieldset {
    border: none;
}

.checkbox p,
.checkbox .inputs {
    float: left;
}

.checkbox p {
    padding: 0;
    margin: 0 0 1em;
}

.checkbox .inputs {
    width: 165px;
}

.checkbox .inputs,
.checkbox .inputs li {
    list-style: none;
    margin: 0 0 1em;
    padding: 0;
}

.checkbox .inputs li {
    margin: 0 0 0.3em;
}

.checkbox li label,
.checkbox li input {
    display: inline;
    float: none;
    width: auto;
}

.button input {
    width: auto;
}

.validate_any {
    position: relative;
}

.validate_any.error {
    padding-top: 2em;
    background-position: 0 0.2em;
}

#terms_block {
    background-position: 205px 0.2em;
}

#terms_block .messages li {
    padding-top: 0.2em;
}

.validate_any .messages {
    position: absolute;
    left: 0;
    top: 0.1em;
}</style>
<title>Student Database Edit</title>
<link rel="stylesheet" type="text/css" href="db/demo.css" />
<style type="text/css">

</style>


  </head>
  
        <body>
    <h1></h2><p style="text-align: left;font-size: 30px"><a href="../../index.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="../../signout.php">Sign Out</a></p></h1>
      
	  
	  
	  
	  
	  <div id="main-container">
        <div id="form-container">

<h1 style="text-decoration: underline">Edit Student Database</h1>
<br>
<br>
<form action="submitsd.php" id="student" class="validate" method="post">
  <fieldset>
  <div class="field">
      <label for="username">Username</label>
      <label for="username"><?php echo $row['user_id']; ?></label>
    </div>
    <div class="field">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" class="required email" value="<?php echo $row['email_id']?>" />
    </div>
    
    <div class="field">
      <label for="last_name">Name</label>
      <input type="text" name="Name" id="Name" class="required" value="<?php echo $row['name']?>" />
    </div>
    <div class="password">
      
      <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="required password min-length_6" />
      </div>
      <div class="field">
        <label for="password_confirmation">Confirm</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
               class="confirmation-of_password" title="Please enter the exact same password" />
      </div>
	  
    
  </fieldset>
  <fieldset>
  <div class="field">
      <label for="username">Roll No.</label>
      <input type="text" name="Roll_No" id="Roll-No" class="required" value="<?php echo $row['roll_no']?>"/>
    </div>
    <div class="field">
      <label for="Gender">Gender</label>
      <select name="Gender" id="Gender" class="required">
        <option value="">Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
	<div class="field">
      <label for="Branch">Branch</label>
      <select name="Branch" id="Branch" class="required">
        <option value="cse">Computer Science and Engineering</option>
        <option value="ece">Electronics and Communication Engineering</option>
        <option value="cce">Communication and Computer Enginnering</option>
      </select>
    </div>
	
      <div class="field">
        <label for="home">Phone No.</label>
        <input type="text" name="phone" id="phone" value="<?php echo $row['phone_no']?>"/>
      </div>
    <div class="field">
      <label for="street">Address</label>
	  <textarea name="address" id="address"  cols="45" rows="4" class="required"> <?php echo $row['address']?> </textarea>
      
    </div>
  </fieldset>
  
  
  <fieldset>
    <div class="button" id="next"><input type="submit" value="submit" id="submit" class="action" /></div>
	<div class="button" id="reset"><input type="reset" name="button2" id="button2" value="Reset" ></div>
    <div class="button" id="back"><input type="submit" value="Back" /></div>
  </fieldset>
</form>


      </div>
    </div>

    
    <script src="db/validatious.0.9.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
  v2.Field.prototype.successClass = 'success';
  v2.Field.prototype.instant = true;
  v2.Field.prototype.displayErrors = 1;
  v2.Field.prototype.positionErrorsAbove = false;
  v2.Fieldset.prototype.positionErrorsAbove = false;

  
</script>
  </body>
</html>
