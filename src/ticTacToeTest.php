<?php
// start session
session_start();
if (!$_SESSION['auth'] == 1) {
    // check if authentication was performed
    // else die with error
    header('Location: login.php');
} 
else {
?>
<html>
<head>
<title>Tic Tac Toe Game!!!</title>
<script> 
var winner = "lehi";
function goBackToBracket(gameNumber) {
if (gameNumber == 1)
{
	this.window.location = 'index.php?'+'winner='+winner+'&gameNumber='+gameNumber;
}
else
{
	this.window.location = 'index.php?'+'winner='+winner+'&gameNumber='+gameNumber;
}
}
</script>
</head>
<body>
<h1>This is a Dummy Page!!! </h1>
<script>
alert("click ok to return to bracket!!!")
</script>
<script> goBackToBracket(0);</script>
</body>
</html>
<?php
}
?>
