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
<HEAD>
<script src="../populateBracket.js">
</script>
<STYLE TYPE="text/css">
BODY{background-color: white}
IMG {border: 0}
A:visited {color: blue}
FONT.score {color: blue; font-size: large}
FONT.redscore {color: red}
FONT.blackscore {color: black}
</STYLE>
<SCRIPT LANGUAGE="JavaScript" >
      var gup = function( name ) {
   
      var results = (new RegExp("[\\?&]"+name+"=([^&#]*)")).exec(window.location.href);
   
      if ( results == null ) {return ""}
   
      else {return results[1]}
   
      };
function goBackToBracket(gameNumber) {
if (gameNumber == 1)
{
	this.window.location = 'index.php?'+'winner='+winner+'&gameNumber='+gameNumber+'&match_id='+match_id;
}
else
{
	this.window.location = 'index.php?'+'winner='+winner+'&gameNumber='+gameNumber+'&match_id='+match_id;
}
}


<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
var vals = new Array()
var gameActive = 0
function rePlay() {
if (gameActive == 1) {
document.formo.redScoreBoard.value = redScore + ""
document.formo.blackScoreBoard.value = blackScore + ""
clearBoard()
}
for (var c1 = 0; c1 <= 6; c1++) {
vals[c1] = 0
   }
}

var redSpot = new Image()
var blackSpot = new Image()
var emptySpot = new Image()
var emptyChecker = new Image()
var redChecker = new Image()
var blackChecker = new Image()

redSpot.src = "fillred.gif"
blackSpot.src = "fillblack.gif"
emptySpot.src = "fillempty.gif"
emptyChecker.src = "clearness.gif"
redChecker.src = "redchecker.gif"
blackChecker.src = "blackchecker.gif"

var whosTurn = "red"
var whosTurnSpot = new Image()
var whosTurnChecker = new Image()
whosTurnSpot.src = redSpot.src
whosTurnChecker.src = redChecker.src

function clearBoard() {
for (var a = 7; a <= 48; a++) {
document.images[a].src = emptySpot.src
   }
}
function placeTop(picToPlace) {
if (gameActive == 1) {
document.images[picToPlace].src = whosTurnChecker.src
   }
}
function unPlaceTop(picToUnplace) {
if (gameActive == 1) {
document.images[picToUnplace].src = emptyChecker.src
   }
}
var placeLoc
function dropIt(whichRow) {
if (gameActive == 1) {
//alert("func dropIt")
placeLoc = (7 - vals[whichRow]) * 7 -7 + whichRow
if (vals[whichRow] < 6) {
document.images[placeLoc].src = whosTurnSpot.src
vals[whichRow] = vals[whichRow] + 1
checkForWinner(whosTurn)
switchTurns()
placeTop(whichRow)
      }
   }
}
function whoGoesFirst() {
whosTurn = whosFirst
switchTurns()
if (whosFirst == "red") {
whosFirst = "black"
} else {
whosFirst = "red"
   }
}
function switchTurns() {
if (gameActive == 1) {
//alert("func switchTurns")
if (whosTurn == "red") {
whosTurn = "black"
whosTurnSpot.src = blackSpot.src
whosTurnChecker.src = blackChecker.src
document.formo.texter.value = blackPlayerName + "'s turn."
} else {
whosTurn = "red"
whosTurnSpot.src = redSpot.src
whosTurnChecker.src = redChecker.src
document.formo.texter.value = redPlayerName + "'s turn."
      }
   }
}
var i=0;
var redPlayer
var blackPlayer
var whosFirst
var match_id
var redPlayerName
var blackPlayerName
var winnerName
function askForNames() {
if (gameActive == 1) {
//alert("func askForNames")
redScore = 0
blackScore = 0
document.formo.redScoreBoard.value = redScore + ""
document.formo.blackScoreBoard.value = blackScore + ""
matchMade = 1

//var qs2 = new Querystring("player1=value1&player2=value2")
//alert(player[i] + player[i+1]);


redPlayer = gup("player1ID")//prompt("What is the name of the red player?", "")
blackPlayer = gup("player2ID")//prompt("What is the name of the black player?", "")
redPlayerName = gup("player1Name")
blackPlayerName = gup("player2Name")
winnerName;
whosFirst = redPlayer//prompt("Which player is going first?", "")
if (redPlayer == null || redPlayer == "") {
redPlayer = "Red Player"
}
if (blackPlayer == null || blackPlayer == "") {
blackPlayer = "Black Player" 
}
if (whosFirst == "r" || whosFirst == "red" || whosFirst == redPlayer) {
document.formo.texter.value = redPlayerName + "'s turn."
whosTurn = "black"
switchTurns()
whosFirst = "red" 
} else {
document.formo.texter.value = blackPlayerName + "'s turn."
whosTurn = "red"
switchTurns()
whosFirst = "black"
       }
   }
}
var lookForSrc
var redScore = 0
var blackScore = 0
var someOneWon
var rowsFull = 0
var winner;
function checkForWinner(colorToCheck) {
if (gameActive == 1) {
//alert("func checkForWinner")
someOneWon = 0
if (colorToCheck == "red") {
lookForSrc = redSpot.src
winner = redPlayer;
winnerName = redPlayerName;
}
if (colorToCheck == "black") {
lookForSrc = blackSpot.src
winner = blackPlayer;
winnerName = blackPlayerName
}
rowsFull = 0
//alert("LookForSrc = " + lookForSrc + ".  And document.images[7].src = " + document.images[7].src)
for (var counter = 7; counter <= 48; counter++) {
if (document.images[counter].src == lookForSrc) {
if ((counter + 3 <= 48 
&& counter != 11 && counter != 12 && counter != 13 
&& counter != 18 && counter != 19 && counter != 20 
&& counter != 25 && counter != 26 && counter != 27 
&& counter != 32 && counter != 33 && counter != 34 
&& counter != 39 && counter != 40 && counter != 41
&& document.images[counter + 1].src == lookForSrc
&& document.images[counter + 2].src == lookForSrc
&& document.images[counter + 3].src == lookForSrc) 
|| (counter + 3 * 7 <= 48
&& document.images[counter + 7].src == lookForSrc
&& document.images[counter + 7*2].src == lookForSrc
&& document.images[counter + 7*3].src == lookForSrc)
|| (counter + 3 * 7 <= 48
&& counter != 11 && counter != 12 && counter != 13 
&& counter != 18 && counter != 19 && counter != 20 
&& counter != 25 && counter != 26 && counter != 27 
&& document.images[counter + 7 + 1].src == lookForSrc
&& document.images[counter + 7*2 + 2].src == lookForSrc
&& document.images[counter + 7*3 + 3].src == lookForSrc)
|| (counter - 3 * 7 >= 7
&& counter != 32 && counter != 33 && counter != 34 
&& counter != 39 && counter != 40 && counter != 41
&& counter != 46 && counter != 47 && counter != 48
&& document.images[counter - 7 + 1].src == lookForSrc
&& document.images[counter - 7*2 + 2].src == lookForSrc
&& document.images[counter - 7*3 + 3].src == lookForSrc)) {
for (var c2 = 0; c2<= 6; c2++) {
unPlaceTop(c2)
}
if (colorToCheck == "red") {
//alert(redPlayer + " wins.")
//winner = bracketData.players[winner].name;
creatediv('winner_div', winnerName + ' is the winner' , 160, 25, 380, 384)
//alert(redPlayer + " wins.")
//new stuff from me 

match_id = gup("match_id");
//document.write("<button onclick=\"Ajax(winner, match_id);\">Update Bracket Game</button>")
createButton(winner, match_id);
//alert(winner + "winner" + match_id + "match_id");
//Ajax(winner, match_id);

redScore += 1
//goToPopulateBracketToseeCurrentGame();

} else if (colorToCheck == "black") { 
//alert(blackPlayer + " wins.")
//new stuff from me
creatediv('winner_div', winnerName + ' is the winner' , 160, 25, 380, 384)
match_id = gup("match_id");
createButton(winner, match_id);
//alert(winner + "winner" + match_id + "match_id");
//Ajax(winner, match_id);

blackScore += 1
//goToPopulateBracketToseeCurrentGame()
}
gameActive = 0
someOneWon = 1
counter = 49
document.formo.redScoreBoard.value = redScore + ""
document.formo.blackScoreBoard.value = blackScore + ""
      }
   }
}
if (someOneWon != 1) {
for (var poo = 0; poo <= 6; poo++) {
if (vals[poo] == 6) {
rowsFull += 1
}
}
if (rowsFull == 7) {
for (var c3 = 0; c3<= 6; c3++) {
unPlaceTop(c3)
}
gameActive = 0
alert("This game has reached a draw. Press OK to play the Game again!")
newGame()

         }
      }
   }
}
var matchMade = 0
function newGame() {
if (matchMade == 1) {
gameActive = 1
rePlay()
whoGoesFirst()
   }
}
function goToPopulateBracketToseeCurrentGame() {
var one = 1;
goBackToBracket(one);
}
function newMatchUp() {
//if (confirm("Are you sure you want to Start a new match?")) {
gameActive = 1
rePlay()
askForNames()
   //}
}
function setMsg(whatToSay) {
window.status = whatToSay
return true
}

// End -->
</script>
</HEAD>
<body> 
<script>//newMatchUp();</script>
<BODY OnLoad="rePlay();newMatchUp()">

<center>
<form name="formo" onload="newMatchUp()">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<!-- <td align=right>Click to start <input type="button" name="startButton" value="New Match" onClick="newMatchUp()"></td> -->

</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td align=right><input type="button" name="reStartButton" value="New Game" onClick="newGame()"></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td align=right><input type="text" name="texter" size="20"></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td valign="bottom" align=right><font class="score">SCORE:</font><br><font class="redscore">Red</font>  <font class="blackscore">Black</font></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td valign="top" align=right><input type="text" name="redScoreBoard" size="3"><input type ="text" name="blackScoreBoard" size="3"></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></A></td>
</tr>
</table>
</form>
</center>


</body>
<!-- SIX STEPS TO INSTALL CONNECT 4:

  1.  Copy the coding into your Connect 4 Opener page
  2.  Create a new document, save it as connect-4.html
  3.  Paste the next code into HEAD of your HTML document
  4.  Add the onLoad event handler into the BODY tag
  5.  Put the last coding into the BODY of your HTML document
  6.  Be sure to upload all the game images to your site  -->

<!-- STEP ONE: Paste this code into your opener page  -->

<center>
<form name="open-connect4">
<input type=button value="Play Connect 4" onClick="window.open('connect-4.html','connect4','top=100,left=100,width=575,height=400');">
</form>
</center>

<!-- STEP TWO: Create a new document, save it as connect-4.html  -->

<!-- STEP THREE: Put this in the HEAD of the connect-4.html page  -->

<!-- STEP FOUR: Put this onLoad event handler into the BODY tag  -->

<BODY OnLoad="rePlay()">

<!-- STEP FIVE: Copy this code into the BODY of connect-4.html  -->

<!-- STEP FOUR: Be sure to upload all the game images to your site  -->

<!-- http://javascript.internet.com/img/connect-4/connect-4.zip -->

<p><center>
<font face="arial, helvetica" SIZE="-2">Free JavaScripts provided<br>
by <a href="http://javascriptsource.com">The JavaScript Source</a></font>
</center><p>

<!-- Script Size:  17.21 KB -->
<?php
}
?>
