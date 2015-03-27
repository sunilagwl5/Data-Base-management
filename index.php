<?php
$con=mysqli_connect("127.0.0.1","root","","dbmsproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
  if((isset($_SESSION['activstu'])) || (isset($_SESSION['activlib'])) || (isset($_SESSION['activfac'])) )
  {
  	if($_SESSION['activlib']==5)
		header('Location:librarian.php');
	else if($_SESSION['activstu']==5)
		header('Location:student.php');
	else if($_SESSION['activfac']==5)
		header('Location:faculty.php');
  }
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Library Database</title>
<style type="text/css">

#content {	float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }
.login-popup{
	display:none;
	background: #333;
	padding: 10px; 	
	border: 2px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}	
.btn-sign {
	width:460px;
	margin-bottom:20px;
	margin:0 auto;
	padding:20px;
	border-radius:5px;
	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
	background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
	text-align:center;
	font-size:36px;
	color:#fff;
	text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
	display: none;
	background: #000; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.8;
	z-index: 999;
}
form.signin .textbox label { 
	display:block; 
	padding-bottom:7px; 
}

form.signin .textbox span { 
	display:block;
}

form.signin p, form.signin span { 
	color:#999; 
	font-size:11px; 
	line-height:18px;
} 

form.signin .textbox input { 
	background:#666666; 
	border-bottom:1px solid #333;
	border-left:1px solid #000;
	border-right:1px solid #333;
	border-top:1px solid #000;
	color:#fff; 
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px;
    -webkit-border-radius: 3px;
	font:13px Arial, Helvetica, sans-serif;
	padding:6px 6px 4px;
	width:200px;
}

form.signin input:-moz-placeholder { color:#bbb; text-shadow:0 0 2px #000; }
form.signin input::-webkit-input-placeholder { color:#bbb; text-shadow:0 0 2px #000;  }
img.btn_close {
	float: right; 
	margin: -28px -28px 0 0;
}


.button { 
	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
	background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
	border-color:#000; 
	border-width:1px;
	border-radius:4px 4px 4px 4px;
	-moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	color:#333;
	cursor:pointer;
	display:inline-block;
	padding:6px 6px 4px;
	margin-top:10px;
	font:12px; 
	width:214px;
}

.button:hover { background:#ddd; }
</style>

    <link rel="stylesheet" type="text/css" href="fdw-demo.css" media="all" />
    <link href='' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-v1.7.1.js"></script>
<script type="text/javascript" src="js/jquery-hover-effect.js"></script>
<script type="text/javascript">
//Image Hover
jQuery(document).ready(function(){
jQuery(function() {
	jQuery('ul.da-thumbs > li').hoverdir();
});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>
</head>
<body>

<div id="container">
				
<header>
				<h1><strong> <a href="">Library Databbse</a></strong></h1>
            </header>
<div class="freshdesignweb">     


    <div class="image_grid portfolio_4col">
    <ul style="height: 495px;" id="list" class="portfolio_list da-thumbs">
	<li>
            <img src="images/student.png" alt="img" height="160" width="160">
            <article class="da-animate da-slideFromRight" style="display: block;">
                <h3>Student</h3>
                <em>Login/Search</em>
				<span class="link_post"><a href="#login-box" class="login-window"></a></span>
				<span class="zoom"><a href="#login-box"></a></span>
            </article>
        </li>
		<li>
	

            <img src="images/faculty.jpg" alt="img" height="160" width="160">
            <article class="da-animate da-slideFromTop" style="display: block;">
                <h3>Faculty</h3>
                <em>Login/Search</em>
                <span class="link_post"><a href="#login-box" class="login-window"></a></span>
                <span class="zoom"><a href="images/portfolio2.jpg"></a></span>
            </article>
        </li><li>
            <img src="images/signup.jpg" alt="img" height="160" width="160">
            <article class="da-animate da-slideFromLeft" style="display: block;">
                <h3>Signup</h3>
                <em>Your form will be validated</em>
                <span class="link_post"><a href="demo/register.php"></a></span>
                
            </article>
        </li><li>
            <img src="images/librarian.jpg" alt="img" height="160" width="160">
            <article class="da-animate da-slideFromRight" style="display: block;">
                <h3>Librarian</h3>
                <em>Login/Search</em>
                <span class="link_post"><a href="#login-box" class="login-window"></a></span>
                <span class="zoom"><a href="images/portfolio4.jpg"></a></span>
            </article>
        </li><li>
            <img src="images/visitor.jpg" alt="img" height="160" width="160">
            <article class="da-animate da-slideFromRight" style="display: block;">
                <h3>Visitor</h3>
                <em>Search</em>
                
                <span class="zoom"><a href="images/portfolio5.jpg"></a></span>
            </article>
        </li>
    </ul>
    </div>
    <!-- Portfolio 4 Column End -->
</div></div>

<div id="login-box" class="login-popup">

        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="authentication.php" >
                <fieldset class="textbox">
				<br>
            	<label class="username">
                <span><p style="color:white">Username </p></span>
				<input id="userid" name="userid" value="" type="text" autocomplete="on" >
                </label>
               
                <label class="password">
                <span><p style="color:white">Password</p></span>
                <input id="password" name="password" value="" type="password" >
                </label>
				<span><a  href="#akg" style="color:white">Forgot your password?</a></span>
                <button class="submit button" type="submit">Sign in</button>
                <p>
                
                </p>
                
                </fieldset>
          </form>
		  
		 </div>

		
<div class="clr"></div>
            
            


</body>
</html>
