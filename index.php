<!--
Author: David Kalina

For senior seminar PANDa logger project ECE4899 12/11/15

University of Colorado Colorado Springs
-->
<?php include "base.php"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>ECE4899 Login</title>
<link rel="stylesheet" href="style/style.css" type="text/css" />
<script src="js/modernizr.custom.63321.js"></script>
<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #7f9b4e url(images/bg2.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
</head>  
<body>  
<div id="main">

<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
    // let the user access the main page
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    // let the user login
}
else
{
    // display the login form
}

	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
		{
	// on success
     ?>
	 <div class="form-4">
	 <center>
     <h1>Member Area</h1>
     <p>Thanks for logging in! You are <code><?=$_SESSION['Username']?></code></p>
	 
	 <br/>	 
	 <a href="http://192.168.137.100/all.php" class="link">Room 1</a><br/><br/>	
	 <a href="http://192.168.137.101/room2.php" class="link">Room 2</a><br/><br/>	
	 <!--<a href="all.php" class="link">View All</a><br/><br/>-->	 
	 <a href="test_graph.php" class="link">TEST</a><br><br>	 
	 
	 <br/>
	 <a href="logout.php" class="link">log out</a>
     </center>
	 </div>
     <?php
	}
		elseif(!empty($_POST['username']) && !empty($_POST['password']))
			{
			$username = mysql_real_escape_string($_POST['username']);
			$password = md5(mysql_real_escape_string($_POST['password']));
     
			$checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
    
			if(mysql_num_rows($checklogin) == 1)
	
    {
        $row = mysql_fetch_array($checklogin);
                 
        $_SESSION['Username'] = $username;        
        $_SESSION['LoggedIn'] = 1;
         
        //echo "<h1>Success</h1>";
        //echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='=2;index.php' />";
		
		?>
		<div class="form-4">
		<center>
		<h1>Member Area</h1>
		<p>Thanks for logging in! You are <code><?=$_SESSION['Username']?></code></p>
	 
	 <br>
	 <a href="http://192.168.137.100/all.php" class="link">Room 1</a><br/><br/>	
	 <a href="http://192.168.137.101/rm_test.php" class="link">Room 2</a><br/><br/>	
	 <!--<a href="all.php" class="link">View All</a><br/><br/>-->	 
	 <a href="http://192.168.137.100/test_graph.php" class="link">TEST</a><br><br>
	 
	 <br>
	 <a href="logout.php" class="link">log out</a>
	 </center>
	 </div>
		<?php

    }
    else
    {
        echo "<center><h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p></center>";
    }
}
else
{
    ?>
	<div class="container">					
			
			<section class="main">
				<form class="form-4" method="post" action="index.php" name="loginform" id="loginform">			
				
				    <h1>Member Login</h1>
     
					<p>To view sensor data! Please either login below, or <a href="register.php">click here to register</a>.</p>
         
				    <p>
				        <label for="username">Username</label><input type="text" name="username" id="username" placeholder="Username" required>
				    </p>
				    <p>
				        <label for="password">Password</label><input type="password" name='password' id="password" placeholder="Password" required> 
				    </p>

				    <p>
				        <input type="submit" name="login" id="login" value="Login">
				    </p>  
						
				</form>​
			</section>
			
        </div>
   <?php
}
?>
 
 
</div>
</body>
</html>