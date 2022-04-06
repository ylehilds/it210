<?php
if(isset($_POST['name']) || isset($_POST['pass']) || isset($_POST['full'])) {//form submitted
if (empty($_POST['name'])) {//check for required values
die("ERROR: Please enter username!");
}
if(empty($_POST['pass'])){//check for required values
die("ERROR: Please enter password!");
}
if (empty($_POST['full'])) {//check for required values
die("ERROR: Please enter full name!");
}
include("connect.php");
include ("php_functions.php");
$new_user = $_POST['name'];
$user_pass = $_POST['pass'];
$user_fullName = $_POST['full'];
$connection=mysql_connect($host,$user,$pass) or die ("Unable to connect!");//open connection
mysql_select_db($db) or die ("Unable to select database!");//select database
$unique_name_result = mysql_query("SELECT * FROM Users WHERE username='".$_POST['name']."' ");
$number_of_name_result_rows = mysql_num_rows($unique_name_result);

$query_max_users = mysql_query ("SELECT * FROM Users");
$number_of_users = mysql_num_rows($query_max_users);
if ($number_of_name_result_rows >= 1 ) {
echo ("<div id='".name_taken_error_message."'> there is already an user with that name, Please choose another username! </div>");
} else if ($number_of_users >= 8) {
echo ("<div id='".name_taken_error_message."'> Sorry Maxed out users! </div>");
}
else {
$query="INSERT INTO Users VALUES (0,'".$new_user."','".$user_fullName."','".MD5($user_pass)."','','',0,0,0,0,0,0)";//create query
$result=mysql_query($query) or die ("Error in query:$query.".mysql_error());//execute query
$filename="data.json";// file example 1: read a text file into a string with fgets //updateJson($new_user);
$output="";
$file = fopen($filename, "r");
while(!feof($file)) {
  $output = $output . fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
$playerData = json_decode($output);
$playerData->players[$number_of_users]->name = $new_user; // modifies $playerData name fpr each player based on 
$playerData->players[$number_of_users]->image = 'blank';
$playerData->players[$number_of_users]->avatar = 'blank';
$playerData2 .= json_encode($playerData);
$file_to_write="data.json";
$file = fopen ($file_to_write, "w");
fwrite($file, $playerData2);
fclose ($file);
header('Location: login.php');//redirection to login
}
}
?>
<html>
<head>
<title>New Registration</title>
<link rel="stylesheet" href="mystyle.css" type="text/css" />
</head>
<body>
<img id="byu" src="images/BYU.gif" alt="byu logo picture"/>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Username <input type="text" name="name" value="<?php echo $_COOKIE['username'];?>">
<p />
Password <input type="password" name="pass">
<p />
<p />
Full Name <input type="fullname" name="full">
<p />
<input type="submit" name="submit" value="Register">
</center>
</body>
</html>