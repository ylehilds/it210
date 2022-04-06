<?php
    // pull in the database connection settings
    include_once("connect.php");

    $connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");
    
    // select database
    mysql_select_db($db) or die ("Unable to select database!");

    // set the variables we got
    $him = urldecode($_POST['him']);
    $username = $_COOKIE['username'];

    $myturn = 0;
    if ($player == 1) $myturn = 1; // it is your turn if you are player 1
    
    // check to see if your myturn is green.
    $sql = "SELECT myturn FROM Users WHERE username='$username' AND myturn='1'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) > 0) {
        
        // now get the move of the opponent
        $sql2 = "SELECT mymove FROM Users WHERE username='$him'";
        $result2 = mysql_query($sql2);
        while ($row = mysql_fetch_assoc($result2)) {
            echo $row['mymove'];
        }
        mysql_free_result($result2);
    }
    mysql_free_result($result);

?>

