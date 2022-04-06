<?php
include("connect.php");
include ("php_functions.php");
//$new_user = $_POST['name'];
//$user_pass = $_POST['pass'];
//$user_fullName = $_POST['full'];
$connection=mysql_connect($host,$user,$pass) or die ("Unable to connect!");//open connection
mysql_select_db($db) or die ("Unable to select database!");//select database
$playersLoggedIn = mysql_query("SELECT username FROM Users WHERE logged_in=1");
$names;
$array=array();
$i=0;
//echo "<table id=\"myTable\" border=\"3px\" CELLSPACING=3>";
$encoding = json_decode("");
while($players = mysql_fetch_array($playersLoggedIn))
  {
  $names = $players['username'];
  $array[$i] = $names;
$encoding->username->name[$i]=$players['username'];
$i++;
//echo "<tr><td width=\"100%\"><FONT COLOR=\"green\">$names</FONT></td></tr>";
}
$encoding = json_encode($encoding);
//echo "</table>";
$users = json_encode($array);
echo header("Content-type:application/x-json");
//echo $users
echo $encoding;
?>


