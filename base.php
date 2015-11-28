<?php
// connect DB
session_start(); 

$dbhost = "localhost";                 // this will ususally be 'localhost', but can sometimes differ
$dbname = "1906630_ece4899";           // the name of the database that you are going to use for this project
$dbuser = "root";                      // the username that you created, or were given, to access your database
$dbpass = "panda";                     // the password that you created, or were given, to access your database
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());

?>