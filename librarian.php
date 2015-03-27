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
  	header('Refresh: 2;url=index.php');
  	die('You must login First');
	
  }
  
  $_SESSION['activlib']=5;
  $username=$_SESSION['username'];
  $result = mysqli_query($con,"SELECT * FROM member WHERE user_id='$username'");
  $row=mysqli_fetch_array($result);
  if(!($row['post']==3))
  {
  	header('Refresh: 2;url=index.php');;
  	die('You must login as librarian');
	
	
  	
	}
  
  $result1 = mysqli_query($con,"SELECT * FROM librarian WHERE user_id='$username'");
  	
  
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
  
  $_SESSION['activfac']=5;
  $_SESSION['activstu']=5;
  
  
  
  //echo $user;echo $name;echo $email;echo $gender;echo $phone;
mysqli_close($con);
?>
  
  
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Librarian Portal</title>
        
        <link rel="stylesheet" href="student/css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="librarian/sliding.form.js"></script>
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
                <h1 style="color:#fac905">Hello,<br><?php echo $name ?></h1>
				<br>
				<br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style="font-size: 18px;text-decoration: underline;" 
				href="dbedit/libdb/libeditdb.php">Edit your deatils</a>
            </span>
        </div>
        <div id="content">
            <h1>Librarian Portal</h1>
            <div id="wrapper">
                <div id="steps">
                    
                        <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Personal Details</legend>
							<br>
							
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
							<br>
							
							<br><br>
                        </fieldset>
                        <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Update Stock Arrival</legend>
							<br>
							<Form name ="form1" Method ="Post" action ="radiobutton/radioButton.php">
								Select the type <br>
								<p style="text-align: left"><Input type = 'Radio' Name ='choice' value= '1' checked>----------------- Book <br></p>
								<p style="text-align: left"><Input type = 'Radio' Name ='choice' value= '2'>----------------- Ebook <br></p>
								
								<p style="text-align: left"><Input type = 'Radio' Name ='choice' value= '3'>----------------- Journals <br></p>
								<p style="text-align: left"><Input type = 'Radio' Name ='choice' value= '4'>----------------- Magazines <br></p>
								<p class="submit">
                                <button id="registerButton" type="submit" name="submit3">Submit</button>
                            	</p>
								
							</form>
                           
                            
                        </fieldset>
                        <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Stock Query</legend>
							<br><br>
							<form name="form" method="POST" action="stockdb/stockdb.php">
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
							<br>
							<br>
                            <p style="font-size: 15px">Slot 1:&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $isbn1; ?> </p>
							<p style="font-size: 15px">Slot 2:&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $isbn2; ?> </p>
                        </fieldset>
						<fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Edit Database</legend>
							<br>
							<Form name ="form3" Method ="Post" action ="radiobutton/radiobutton1.php">
								Edit Database of: <br>
								<p>
                                <label for="db">Edit Database of: </label>
                                <select id="edit" name="edit">
                                    <option value="1">Student</option>
                                    <option value="2">Faculty</option>
                                    <option value="3">Book</option>
									<option value="4">E-Book</option>
									<option value="5">Journals</option>
									<option value="6">Magazines</option>
								</select>
                            </p>
							<p>
                                <label for="name">Enter Name: </label>
                                <input id="name" name="name" />
                            </p>
							<p class="submit"><button type="submit" name="submit4">Edit</button></p>
								
								
								
							</form>
                           
                            
                        </fieldset>
						
						     <fieldset class="step" style="border: 0px solid #000000">
                            <legend style="font-size: 30px; text-decoration:underline;">Sign Out</legend>
							<br>
							<br>
                            <p style="font-size: 40px"><br>
                                Click here to <br><a href="signout.php">Sign Out</a></p>
                            
                        </fieldset>
						
                    
                </div>
                <div id="navigation" style="display:none;">
                    <ul>
                        <li class="selected">
                            <a href="#">Personal Details</a>
                        </li>
                        <li>
                            <a href="#">Update Stock</a>
                        </li>
                        <li>
                            <a href="#">Stock Query</a>
                        </li>
						<li>
							<a href="#">Issue books</a>
						</li>
						<li>
                            <a href="#">Edit Database</a>
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