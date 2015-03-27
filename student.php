<?php
// making an connection  
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
  if(!isset($_SESSION['username']))
  {
  	die('You must login First <a href="index.php">Back</a>');
  }
  $username=$_SESSION['username'];
  $_SESSION['activstu']=5;
  
  $result = mysqli_query($con,"SELECT * FROM member WHERE user_id='$username'");
  $row=mysqli_fetch_array($result);
  if(!($row['post']==1))
  {
  	header('Refresh: 1;url=index.php');
  	die('you Must log in as student');
	//if($_SERVER['HTTP_REFERER'])
	//	header('Location: '.$_SERVER['HTTP_REFERER']);
	}
  
  $result1 = mysqli_query($con,"SELECT * FROM student WHERE student_id='$username'");
  	
  
  $row1=mysqli_fetch_array($result1);
  if(empty($row['isbn1']))
	$isbn1= "No book";
	else
	  $isbn1=$row['isbn1'];
	  
	if(empty($row['isbn2']))
		$isbn2= "No book";
	else
	  $isbn2=$row['isbn2'];
  $user= $row['user_id'];
  $name=$row['name'];
  $email=$row['email_id'];
  $gender=$row['sex'];
  $phone=$row['phone_no'];
  $jdate=$row['join_date'];
  $addrs=$row['address'];
  $stream=$row1['stream'];
  $rollno=$row1['roll_no'];
  
  
  //echo $user;echo $name;echo $email;echo $gender;echo $phone;
mysqli_close($con);
?>
  
  
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Student Portal</title>
        
        <link rel="stylesheet" href="student/css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="student/sliding.form.js"></script>
    </head>
    <style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;
            
        }
		p{
			background-color:#f4f4f4;box-shadow:0px 0px 3px #aaa;width:400px;
    padding:10px;
    margin-left:100px;border:1px solid #fff;
		}
        h1{
            color:#ccc;
            font-size:36px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
        }
    </style>
    <body>
        <div>
            <span class="reference">
                <h1 style="color:#fac905">Hello, <br><?php echo $name ?></h1> 
				<br>
				<br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style="font-size: 18px;text-decoration: underline;" 
				href="dbedit/sdb/studentdb.php">Edit your deatils</a>
            </span>
        </div>
        <div id="content">
            <h1>Student Portal</h1>
			            <div id="wrapper">
                <div id="steps">
                    
                        <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Personal Details</legend>
							<br><br>
                            <p>
                                Name: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $name ?>
                                
                            </p>
							<p>
                                Username: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $user ?>
                                
                            </p>
                            <p>
                             Email: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $email ?>
                                
                            </p>
                            <p>
                                Gender: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $gender ?>                               
                            </p>
							<p>
                                Phone No: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $phone ?>
                            </p>
							<p>
                                Joining Date: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $jdate ?>
                               
                            </p>
							<p>
                                Address: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $addrs ?>
                            </p>
							<p>
                                Roll No: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $rollno ?>
                            </p>
							<p>
                                Stream: &nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $stream ?>
                            </p>
							<br>
							
                        </fieldset>
                        <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Stock Query</legend>
							<br><br>
                            <form name="form1" method="POST" action="stockdb/stockdb.php">
                           <p>
                                <label for="stock">Stock</label>
                                <select id="stock" name="stock">
                                    <option value="1">Book</option>
                                    <option value="2">E-Book</option>
                                    <option value="3">Journals</option>
									<option value="4">Magazines</option>
                                </select>
                            </p>
							<p>
                                <label for="name">Enter Title: </label>
                                <input id="title" name="title" />
                            </p>
							<p class="submit"><button type="submit" name="submit1">Find</button></p>
                           </form>
						   
						   <form name="form2" method="POST" action="issue.php">
                           
							<p>
								
                                <label for="name">Enter the LID: </label>
                                <input id="lid" name="lid" />
                            </p>
							<p class="submit"><button type="submit" name="submit2">Issue</button></p>
                           </form>
                            
                        </fieldset>
                        <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Issue Status</legend>
							<br><br>
                            <br>
							<br>
                            <p style="font-size: 15px">Slot 1:&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $isbn1; ?> </p>
							<p style="font-size: 15px">Slot 2:&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $isbn2; ?> </p>
                        </fieldset>
                        <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Sign Out</legend>
							<br><br>
                            <p style="font-size: 40px">
                                Click here to <br><a href="signout.php">Sign Out</a>
                            </p>
                        </fieldset>
						
                    
                </div>
                <div id="navigation" style="display:none;">
                    <ul>
                        <li class="selected">
                            <a href="#">Personal Details</a>
                        </li>
                        <li>
                            <a href="#">Books Query</a>
                        </li>
                        <li>
                            <a href="#">Issue Status</a>
                        </li>
                        <li>
                            <a href="#">Sign Out</a>
                        </li>
						
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>