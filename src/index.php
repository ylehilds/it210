<?php
include ("ipAddress.php");
// start session
session_start();
if (!$_SESSION['auth'] == 1) { 
    // check if authentication was performed
    // else die with error
    header('Location: login.php');
} 
else {

//$iis = "http://192.168.1.107";
$username = $_COOKIE['username'];
$curentGameNum = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script src="jquery-1.4.2.js"> </script> 
<script src="populateBracket.js"></script>

<title> Lab 2 by: Lehi Alcantara</title>
<!-- favicon picture link  -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<!-- external css file call  -->
<link rel="stylesheet" href="mystyle.css" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 

<style type= "text/css">
<!--
h1 { color: green; font-size: 37px; font-family: impact }
h2 {color: blue; font-size: 17px; font-family: sans-serif;}
p { font-family:"Times New Roman",Georgia,Serif; }
-->
</style> 
</head>
<body onload="checkIfThereIsaWinner();buttonHide();">
<!--<script>setInterval( "alert('Hello')", 5000 );</script> -->
<script>setInterval( "updateLoggedIns()", 5000 );</script>
<div id="loggedInPlayersText">List of Logged in Players:</div>
<div id="logged"> </div>
<script>/*var array=[];
array = $('#logged');
alert(array[1])
 

 
*/</script>
<div id="layer1">
	<div id="tic-tac-toe" >
		<img onclick="toggleDiv(1); setCurrentGame(0); <?php $gameNum = "<script>getcurrentGameNum()</script>";?>" id="Introduction_Picture_Tic_Tac_Toe" src="images/tic-tac-toe.gif" alt="Tic Tac Toe Picture" width="50" height="50" />
	</div>
	<div id ="connect4" >
	
	<img onclick="toggleDiv(0); setCurrentGame(1); <?php $gameNum = 0;?>" id="Introduction_Picture_Connect4" src="images/Connect4.gif" alt="Connect 4 Picture" width="50" height="50" />
	</div>
</div>
<div id="my_border">

<div id="choose_game_text"> <h1> Choose A Game <?php echo "$username";?></h1></div>
<!-- banner image made with Gimp  -->
<div id="tic-tac-toe_banner"><img src="images/banner.gif" alt="tic_tac_toe_banner picture" width="400" height="300" /></div>
<div id="connect4_banner"><img src="images/connect4_banner.gif" alt="connect4_picture" width="400" height="300" /></div>
<div id="userName"><h2>username: <?php echo "$username";?></h2></div>
<hr id="my_hr" />

<img id="banner_title_real" src="images/banner_title_real.gif" alt="banner" />

<div id="layer2">

<!--  3 links for mow pointed to google, later to something else -->
<div id="link1"><a href="logout.php">Log Out</a></div>
<div id="link2"><a href="/protect" >Admin Page</a></div>
<div id="link3"><a href="javascript:location.reload(true)" onclick="refresh();">Refresh this page</a></div>

<form action="<?php echo "$iis"?>/Default.aspx?username=<?php echo "$username"?>&curentGameNum=<?php echo "$gameNum"?>" method="post">
<!--<form action="test1.php?username=<?php echo "$username"?>&curentGameNum=<?php echo "$gameNum"?>" method="post">-->
<!-- <input style="display:none" username="<?php echo $username;?>"/> -->
<button id="form_button">Upload New Images</button>
</form>
<?php $test = "disabled=disabled"; ?>
<?php $test="";?>
<!--  7 Play boxes -->
<button id="input1" type="button" name="input1" onclick="functionGoesThroughJsonFile(0,0)">Play</button>
	<button id="input2" type = "button" name="input2" onclick="functionGoesThroughJsonFile(1,1)"  <?php echo "$test"?> >Play</button>
		<button id="input3" type="button" name="input3" onclick="functionGoesThroughJsonFile(2,2)" >Play</button>
			<button id="input4" type="button" name="input4" onclick="functionGoesThroughJsonFile(3,3)" >Play</button>
				<button id="input5" type="button" name="input5" onclick="functionGoesThroughJsonFile(4,4)" >Play</button>
					<button id="input6" type="button" name="input6" onclick="functionGoesThroughJsonFile(5,5)" >Play</button>
						<button id="input7" type="button" name="input7" onclick="functionGoesThroughJsonFile(6,6)" >Play</button>
<!-- A containers,div's, holding images and text  -->
<!-- <a onMouseOver="handleOver(0);return true;" onMouseOut="handleOut(0);return true;"><img id="slot_0_Picture"  src="" width="50" height="50" /></aonMouseOver="handleOver(0);return> -->
<div id ="slot_0_Name"> <p></p></div>
<img id="slot_0_Picture" src="" />

<div id="slot_1_Name"> <p></p></div>
<img id="slot_1_Picture" src="" />

<div id="slot_2_Name"> <p></p></div>
<img id="slot_2_Picture"  src="" />

<div id="slot_3_Name"> <p></p></div>
<img id="slot_3_Picture" src="" />

<div id="slot_4_Name"> <p></p></div>
<img id="slot_4_Picture" src="" />

<div id="slot_5_Name" > <p></p></div>
<img id="slot_5_Picture" src="" />

<div id="slot_6_Name" > <p></p></div>
<img id="slot_6_Picture" src="" />

<div id="slot_7_Name"> <p></p></div>
<img id="slot_7_Picture" src="" />

<div id ="slot_8_Name"> <p> </p></div>
<img id="slot_8_Picture"/>

<div id="slot_9_Name"> <p></p></div>
<img id="slot_9_Picture" />

<div id="slot_10_Name"> <p> </p></div>
<img id="slot_10_Picture"  />

<div id="slot_11_Name"> <p> </p></div>
<img id="slot_11_Picture"  />

<div id="slot_12_Name"> <p> </p></div>
<img id="slot_12_Picture"  />

<div id="slot_13_Name" > <p> </p></div>
<img id="slot_13_Picture"  />

<div id="slot_14_Name" > <p> </p></div>
<img id="slot_14_Picture"  />

<div id="slot_15_Name" > <p> </p></div>
<img id="slot_15_Picture"  />

<!--bracket container-->
<img id="my_Bracket" src="bracket5.gif" alt="backet picture"/>
<!-- </divid="link1"> -->
</body>
</html>
<?php
}
?>
