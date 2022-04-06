<?php
    // pull in the database connection settings
    include_once("connect.php");

    $connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");
    
    // select database
    mysql_select_db($db) or die ("Unable to select database!");

    // set the variables we got
    $him = urldecode($_POST['him']);
    $move = intval($_POST['move']);
    $username = $_COOKIE['username'];

    // set your move and turn
    $sql = "UPDATE Users SET mymove='$move', myturn='0' WHERE username='$username'";
    mysql_query($sql) or die ();

    // set the other guy's turn to green
    $sql = "UPDATE Users SET myturn='1' WHERE username='$him'";
    mysql_query($sql) or die ();

    echo "solid";
?>

