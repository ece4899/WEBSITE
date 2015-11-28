<?php
session_start();
 
//$dbhost = "fdb4.freehostingeu.com"; // this will ususally be 'localhost', but can sometimes differ
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "1906630_ece4899"; // the name of the database that you are going to use for this project
//$dbuser = "1906630_ece4899"; // the username that you created, or were given, to access your database
$dbuser = "root"; // the username that you created, or were given, to access your database
//$dbpass = "panda4899"; // the password that you created, or were given, to access your database
$dbpass = "panda"; // the password that you created, or were given, to access your database
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());


//$sql = 'SELECT * FROM 6_23';
$sql = 'SELECT * FROM bmp180';
mysql_select_db('1906630_ece4899');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
/*while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "Date :{$row['category']}  <br> ".
         "NAME : {$row['N1']} <br> ".
         "DATA : {$row['D1']} <br> ".
         "--------------------------------<br>";
} 
echo "Fetched data successfully\n";*/
//mysql_close($conn);


?>