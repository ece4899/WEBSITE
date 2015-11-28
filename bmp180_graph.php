<?php include "base.php"; ?>

	<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Graphs</title>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/highcharts.js"></script>
		<script src="js/exporting.js"></script>
		<!--<script src="js/data.js"></script>-->
		<style type="text/css">
${demo.css}
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
?>

<?php
$sql = 'SELECT * FROM bmp180';
mysql_select_db('1906630_ece4899');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
	$dServer = array();
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
		$dServer_date[] = $row['category'];		
		$dServer_D1[] = $row['D1'];
	
	
	
     ?>
    <script>
	$(function () {
		var date = <?php echo json_encode($dServer_date); ?>;
		var num = <?php echo json_encode($dServer_N1); ?>;
		var data = <?php echo json_encode($dServer_D1); ?>;
    $('#container').highcharts({
        title: {
            text: 'Temperature/2 Minutes',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: BMP180',
            x: -20
        },
        xAxis: {
			categories: date,
			min: 1
        },
        yAxis: {
            title: {
                text: 'Temp C'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Temperature',
            data: [<?php echo join($dServer_D1, ','); ?>],
			pointStart: 0
        }	]
    });
});
		
	</script>
	<?php
	}	
	?>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	 
	 <br>
	 <a href="index.php">Return to members area</a>
	 <br>
	 <a href="logout.php">log out</a>
      
     <?php
	//}
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
         
        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='=2;index.php' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>
     
   <h1>Member Login</h1>
     
   <p>Thanks for visiting! Please either login below, or <a href="register.php">click here to register</a>.</p>
     
    <form method="post" action="index.php" name="loginform" id="loginform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <input type="submit" name="login" id="login" value="Login" />
    </fieldset>
    </form>
     
   <?php
}
?>
 
</div>
</body>
</html>