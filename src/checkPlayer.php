<?php
    // pull in the database connection settings
    include_once("connect.php");

    $connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");
    
    // select database
    mysql_select_db($db) or die ("Unable to select database!");

    // set the variables we got
    $game = intval($_POST['game']);
    $match = intval($_POST['matchID']);
    $player = intval($_POST['player']);
    $him = urldecode($_POST['him']);
    $username = $_COOKIE['username'];

    $myturn = 0;
    if ($player == 1) $myturn = 1; // it is your turn if you are player 1
    
    // set yourself to playing
    $sql = "UPDATE Users SET game='$game', mymatch='$match', player='$player', mymove='0', myturn='$myturn' WHERE username='$username'";
    mysql_query($sql) or die ();

    // get status of other player
    $sql = "SELECT * FROM Users WHERE username='$him'";

    $result = mysql_query($sql);
    while ($row = mysql_fetch_assoc($result)) {
        if ($row["game"]==$game && $row["mymatch"]==$match) {
            echo 4;
        }
    }
    mysql_free_result($result);

?>

