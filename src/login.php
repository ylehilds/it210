<?php
if(isset($_POST['name']) || isset($_POST['pass'])){ //form submitted
if (empty($_POST['name'])) { //check for required values
die("ERROR: Please enter username!");
}
if(empty($_POST['pass'])){ //check for required values
die("ERROR: Please enter password!");
}
include("connect.php");
$connection=mysql_connect($host,$user,$pass) or die ("Unable to connect!"); //open connection
mysql_select_db($db) or die ("Unable to select database!");//select database
$query="SELECT * FROM Users WHERE username ='".$_POST['name']."' AND password ='".MD5($_POST['pass'])."'"; //create query
$result=mysql_query($query) or die ("Error in query:$query.".mysql_error()); //execute query
if(mysql_num_rows($result)==1){ //see if any rows were returned,if a row was returned, authentication was successful
session_start(); //create session and set cookie with username
$_SESSION['auth'] = 1;
setcookie("username",$_POST['name'],time()+(84600*30));
setcookie("password",$_POST['pass'],time()+(84600*30));
$one=1;
$query="UPDATE Users SET logged_in = '".$one."' WHERE username = '".$_POST['name']."'"; //create query to change logged_in info
$result=mysql_query($query) or die ("Error in query: $query. ".mysql_error());//execute query to change logged_in info
header('Location: index.php');
}
else {//no result
echo "ERROR: Incorrect username or password!";//authentication failed
}
mysql_free_result($result);//free result set memory
mysql_close($connection);//close connection
}
else{// no submission and display login form
?>
<html>
<head>
<link rel="stylesheet" href="mystyle.css" type="text/css" />
</head>
<body>
<p id="not_member_statement">New to the Tournment?</p>
<button id="register_link" onclick="window.location='register.php'">Register</button>
<img id="byu" src="images/BYU.gif" alt="byu logo picture"/>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Username <input type="text" name="name" value="<?php echo $_COOKIE['username'];?>">
<p />
Password <input type="password" name="pass">
<p />
<input type="submit" name="submit" value="Log In">
</center>
</body>
</html>
<?php
}
?>
