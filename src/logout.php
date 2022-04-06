<?php include ("connect.php");
$connection=mysql_connect($host,$user,$pass) or die ("Unable to connect!");
//select database
mysql_select_db($db) or die ("Unable to select database!");   

session_start();

//create query to change logged_in info
$unset=0;
$query="UPDATE Users SET logged_in = '".$unset."' WHERE username = '".$_COOKIE['username']."'";
//execute query to change logged_in info
//print($_COOKIE['password']);

$result=mysql_query($query) or die ("Error in query: $query. ".mysql_error());
session_destroy();
header('Location: login.php');
?>