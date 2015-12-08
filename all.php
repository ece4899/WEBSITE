<?php include "base.php"; ?>

	<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Graphs</title>

		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/highcharts.js"></script>
		<script src="js/exporting.js"></script>
		<script src="js/modernizr.custom.63321.js"></script>

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
$sql = 'SELECT * FROM all_graphs';
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
		$dServer_D1[] = $row['temp'];
		$dServer_D2[] = $row['press'];
		$dServer_D3[] = $row['shumid'];
		$dServer_D4[] = $row['adc'];
		$dServer_D5[] = $row['tslight'];
		$dServer_D6[] = $row['CO'];
	
     ?>
    <script>
	var date = <?php echo json_encode($dServer_date); ?>;
	var chart;
    $(document).ready(function() {
        chachart = new Highcharts.Chart({
                    chart: {
                        renderTo: "container",
                        type: "spline",
                        zoomType: 'x'
                    },
                                        title: {
                        text: 'PANDa Logger'  
                    },
                    subtitle: {
                        text: 'Click and drag in the plot area to zoom in'
                    },
                    plotOptions: {
                        spline: {
                            turboThreshold: 2000,
                            lineWidth: 2,
                            states: {
                                hover: {
                                    enabled: true,
                                    lineWidth: 3
                                }
                            },
                            marker: {
                                enabled: false,
                                states: {
                                    hover: {
                                        enabled : true,
                                        radius: 5,
                                        lineWidth: 1
                                    }
                                }  
                            }      
                        }
                    },
                    xAxis: {
                        categories: date,
                        labels: {
                            rotation: -45,
                            align: 'right',
                            style: "font: 'normal 10px Verdana, sans-serif'"
                        },
                        title: {
                            text: 'Date/Time'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Sensor Data'
                        }
                    },
                    tooltip: {
                        formatter: function() {  
							if (this.series.name === 'Temperature') {
                            return this.point.x + ' ' +
                            '<span style="color:blue;font-weight:bold;">' + this.series.name + '</span><br />' +
                            '<span style="color:blue;font-weight:bold;">' + date[this.point.x] + '</span><br />' +
                            '<span style="color:red;font-weight:normal;">' + 'Temp: </span><span style="font-weight:800;">' + this.point.y + ' °F</span><br />';
							} else if(this.series.name === 'Pressure'){
							 return this.point.x + ' ' +
                            '<span style="color:blue;font-weight:bold;">' + this.series.name + '</span><br />' +
                            '<span style="color:blue;font-weight:bold;">' + date[this.point.x] + '</span><br />' +
                            '<span style="color:red;font-weight:normal;">' + 'Pres: </span><span style="font-weight:800;">' + this.point.y + ' KPa</span><br />';	
							} else if(this.series.name === 'Sound'){
							 return this.point.x + ' ' +
                            '<span style="color:blue;font-weight:bold;">' + this.series.name + '</span><br />' +
                            '<span style="color:blue;font-weight:bold;">' + date[this.point.x] + '</span><br />' +
                            '<span style="color:red;font-weight:normal;">' + 'Sound: </span><span style="font-weight:800;">' + this.point.y + ' Volts*100</span><br />';	
							} else if(this.series.name === 'Light'){
							 return this.point.x + ' ' +
                            '<span style="color:blue;font-weight:bold;">' + this.series.name + '</span><br />' +
                            '<span style="color:blue;font-weight:bold;">' + date[this.point.x] + '</span><br />' +
                            '<span style="color:red;font-weight:normal;">' + 'Light: </span><span style="font-weight:800;">' + this.point.y + ' Lux</span><br />';	
							} else if(this.series.name === 'VOC'){
							 return this.point.x + ' ' +
                            '<span style="color:blue;font-weight:bold;">' + this.series.name + '</span><br />' +
                            '<span style="color:blue;font-weight:bold;">' + date[this.point.x] + '</span><br />' +
                            '<span style="color:red;font-weight:normal;">' + 'VOC: </span><span style="font-weight:800;">' + this.point.y + ' volts</span><br />';	
							} else {
							 return this.point.x + ' ' +
                            '<span style="color:blue;font-weight:bold;">' + this.series.name + '</span><br />' +
                            '<span style="color:blue;font-weight:bold;">' + date[this.point.x] + '</span><br />' +
                            '<span style="color:red;font-weight:normal;">' + 'HMD: </span><span style="font-weight:800;">' + this.point.y + ' %</span><br />';	
							}
                        }
                    },
                    exporting: {
                        enabled: true
                    },
series: [ 
{"data": [<?php echo join($dServer_D1, ','); ?>],"name":"Temperature","type":"spline"},
{"data": [<?php echo join($dServer_D2, ','); ?>],"name":"Pressure","type":"spline"},
{"data": [<?php echo join($dServer_D3, ','); ?>],"name":"Humidity","type":"spline"},
{"data": [<?php echo join($dServer_D4, ','); ?>],"name":"Sound","type":"spline"},
{"data": [<?php echo join($dServer_D5, ','); ?>],"name":"Light","type":"spline"},
{"data": [<?php echo join($dServer_D6, ','); ?>],"name":"VOC","type":"spline"}
]

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