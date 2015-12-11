<!--
Author: David Kalina

For senior seminar PANDa logger project ECE4899 12/11/15

University of Colorado Colorado Springs
-->
<?php include "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 
<title>User Management System </title>
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
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    
     
     $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
      
     if(mysql_num_rows($checkusername) == 1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysql_query("INSERT INTO users (Username, Password) VALUES('".$username."', '".$password."')");
        if($registerquery)
        {
            echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }       
     }
}
else
{
    ?>

	<div class="container">					
			
			<section class="main">
				<form class="form-4" method="post" action="register.php" name="registerform" id="registerform">			
				
				    <h1>Register</h1>
     
					<p>Please enter your details below to register, or <a href="index.php">Back to login</a>.</p>
         
				    <p>
				        <label for="username">Username</label><input type="text" name="username" id="username" placeholder="Username" required>
				    </p>
				    <p>
				        <label for="password">Password</label><input type="password" name='password' id="password" placeholder="Password" required> 
				    </p>

				    <p>
				        <input type="submit" name="register" id="register" value="Register">
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