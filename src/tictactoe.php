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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html> 
<head>
<script src="populateBracket.js">
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
A:link {text-decoration: none; color: #0099FF;}
A:visited {text-decoration: none; color: #0099FF;}
A:active {text-decoration: none; color: #0099FF;}
A:hover {text-decoration: overline; color: #0099FF;}
</style>
    <title>TicTacToe</title>
    <link rel="stylesheet" href="mystyle.css" type="text/css">
    <!--<script language="javascript" type="text/javascript" src="../external.js"></script>-->
    <script language="javascript" type="text/javascript" src="ajax.js"></script>
</head>
<body OnLoad="init()">
<center><h7>Tic Tac Toe!</h7></center><br>
<script name="JavaScript">
 
 
var a, c, p1, p2, p1id, p2id, matchID, me, him, gotime, waitformove, gamewon, legit;
var hisMove, intervalCounter;
var xmlHttp;

function init() {
		// YOU NEED TO CHANGE THIS STUFF
		// This is the variables that you are passing in
		// unescape () unescapes your escape from when you pass it in
		//    explanation: when you pass things you may want to pass a & = ? or some other symbol
		//		therefor you escape it so you can, and then unescape it so that you get that value out
		//		although not enforced, it is a good practice to get into
        p1 = unescape(gup('player1Name'));  //use gup
        p1id = unescape(gup('player1ID'));
        p2 = unescape(gup('player2Name'));
        p2id = unescape(gup('player2ID'));
        matchID = unescape(gup('match_id'));
        
        // me indicates which player you are (1 or 2)
        me = (p1 == "<?php echo $_COOKIE['username']; ?>") ? 1 : 2;
        him = (me == 1) ? p2 : p1; // him = his username (for php reference)

        document.getElementById('players').innerHTML = "<h8>" + p1 + " versus " + p2 + "</h8><br><br>";
        // start playing
        // first call a php page that will add our status to playing and wait till the other player is in the game
        document.getElementById('status').innerHTML = "<b>Waiting for other player to join the game </b>";
        intervalCounter = 0;
        gamewon = false;
	xmlHttp = GetXmlHttpObject();
         if (xmlHttp == null) {
             alert ("Browser does not support HTTP Request");
             return;
            }
        interval = setInterval( "iamplaying_areyou()", 3000 ); // check every 3 seconds

}

function iamplaying_areyou() {
    xmlHttp.open('POST', "checkPlayer.php", true);
    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            if (xmlHttp.responseText == 4) {
                intervalCounter = 0;
                clearInterval(interval);
                finishStarting();
            }
            if(intervalCounter < 40) // = 2 minutes @ 3000
                document.getElementById('status').innerHTML += ".";
            else {
                clearInterval(interval);
                document.getElementById('status').innerHTML += "<br><br>Timeout: The other player doesn't seem to be around";
            }
            intervalCounter++;
        }
    }
    xmlHttp.send("game=1&matchID=" + escape(matchID) + "&player=" + escape(me) + "&him=" + escape(him));
}

function finishStarting() { // well if you got this far, then you're both playing the game
    if (me == 1) { // player 1 goes first
        document.getElementById('status').innerHTML = "";
        document.getElementById('status').style.visibility = "hidden";
        document.getElementById('status_under').innerHTML = "Your turn. Make a move.";
    } else { // player 2 - wait first, then attack.
        document.getElementById("status").innerHTML = "Waiting for the other player to make a move.";
        document.getElementById("status").style.visibility = "visible";
        document.getElementById('status_under').innerHTML = "Opponent's turn. Please wait.";
        //xmlHttp = GetXmlHttpObject()
        interval = setInterval( "getMove()", 2000 ); // check every second
    }
}

function changeTurn(move) {
    if(gamewon == false) {
        document.getElementById("status").innerHTML = "Waiting for the other player to make a move.";
        document.getElementById("status").style.visibility = "visible";
        document.getElementById('status_under').innerHTML = "Opponent's turn. Please wait.";
    }
    //xmlHttp = GetXmlHttpObject()
    changeTurnAjax(move);
}

function changeTurnAjax(move) {
    xmlHttp.open('POST', "takeTurn.php", true);
    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) { // my move is now in the db and the turns are flipped
            gotime = false;
            if(gamewon == false) {
                //xmlHttp = GetXmlHttpObject()
                interval = setInterval( "getMove()", 2000 ); // check every second            
            }
        }
    }
    xmlHttp.send("him=" + escape(him) + "&move=" + escape(move));
}

function getMove() {
    xmlHttp.open('POST', "waitTurn.php", true);
    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            if (xmlHttp.responseText > 0) { // the response should be the opponent's move
                intervalCounter = 0;
                clearInterval(interval);
                hisMove = xmlHttp.responseText;
                finishWaiting(hisMove);
            }
            if(intervalCounter < 30) // = 1 minute @ 2000
                document.getElementById('status').innerHTML += ".";
            else {
                clearInterval(interval);
                document.getElementById('status').innerHTML += "<br><br>Timeout: The other player must have taken a bathroom break.";
                // you may decide to call the game a forfet or do nothing and have a rematch.
            }
            intervalCounter++;
        }
    }
    xmlHttp.send("him=" + escape(him));
}

function finishWaiting(move) {
    if(move == 1) { change_b1(document.getElementById("board")); }
    if(move == 2) { change_b2(document.getElementById("board")); }
    if(move == 3) { change_b3(document.getElementById("board")); }
    if(move == 4) { change_b4(document.getElementById("board")); }
    if(move == 5) { change_b5(document.getElementById("board")); }
    if(move == 6) { change_b6(document.getElementById("board")); }
    if(move == 7) { change_b7(document.getElementById("board")); }
    if(move == 8) { change_b8(document.getElementById("board")); }
    if(move == 9) { change_b9(document.getElementById("board")); }

    if(gamewon == false){
        // because we just got the move from the opponent, it's time for me to go
        document.getElementById('status').innerHTML = "";
        document.getElementById('status').style.visibility = "hidden";
        document.getElementById('status_under').innerHTML = "Your turn. Make a move.";
   }
}

function winner(player) {
    var id;
    if(player == p1) id = p1id;
    else id = p2id;
    
    var html = "<center><h9>"+player+" WINS!!!</h9><p>";
    if(him != player) html += "<button onclick=\"xmlhttpPost('winner_update_json.php?match_id="+matchID+"&file=data.json"+"&id="+id+"', 'ttt', '"+player+"', '"+id+"', '"+matchID+"')\"" +
                  "style=\"font-size:20px;\">Click here to update the JSON file</button>";
    else{
        html += "<button onclick=\"window.location.href='/index.php?currentG=ttt&gameNumber=0&winner=lehi'\" style=\"fontsize:20px;\">Click here to go back to the Bracket</button>";
        resetFields();
    } 
    html +=    "</p></center>";
    
    document.getElementById('status').innerHTML = html;
    document.getElementById('status').style.height = "250px";
    document.getElementById('status').style.visibility = "visible";
}

function resetFields() {
    xmlHttp.open('POST', "resetFields.php", true);
    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            // nothing. just set 'em and leave 'em
        }
    }
    xmlHttp.send("him=" + escape(him));
}

function variables(){
    t = 1;
    change = 1;    
    empty1 = -1;
    empty2 = -1;
    empty3 = -1;
    empty4 = -1;
    empty5 = -1;
    empty6 = -1;
    empty7 = -1;
    empty8 = -1;
    empty9 = -1;
    return;
    whogoesnow = "Turn: " + p1;
}

function win(){

  if   (empty1==empty2 && empty2==empty3 && empty3==0 ||
    empty4==empty5 && empty5==empty6 && empty6==0 ||    
        empty7==empty8 && empty8==empty9 && empty9==0 ||
        empty1==empty4 && empty4==empty7 && empty7==0 ||
        empty2==empty5 && empty5==empty8 && empty8==0 ||
        empty3==empty6 && empty6==empty9 && empty9==0 ||
        empty1==empty5 && empty5==empty9 && empty9==0 ||
        empty3==empty5 && empty5==empty7 && empty7==0 ){
    winner(p2);
    gamewon = true;
  }
  if   (empty1==empty2 && empty2==empty3 && empty3==1 ||
    empty4==empty5 && empty5==empty6 && empty6==1 ||    
        empty7==empty8 && empty8==empty9 && empty9==1 ||
        empty1==empty4 && empty4==empty7 && empty7==1 ||
        empty2==empty5 && empty5==empty8 && empty8==1 ||
        empty3==empty6 && empty6==empty9 && empty9==1 ||
        empty1==empty5 && empty5==empty9 && empty9==1 ||
        empty3==empty5 && empty5==empty7 && empty7==1 ){
    winner(p1);
    gamewon = true;
  }
  	else if (empty1+empty2+empty3+empty4+empty5+empty6+empty7+empty8+empty9==5)//If the game is a tie
	{
		alert ("It's a tie! \nPlay again!"); //alert the user
		resetFields(); //reset for a new game
		startOver= "<?=$_SERVER['PHP_SELF']?>?<?=$_SERVER['QUERY_STRING']?>"; //reloads the page with the query, if the variables were sent via POST method this code will not be effective
		window.location = startOver;
	}
	
  if (legit > -1) { // it was a valid move
    if (legit == me) { // if i clicked it, so i'll call some ajax to update the turns and mymove
        changeTurn(clicked);
    }
  }

}

function turnchange(t){
  if (change == 1)  {
    if (t == 0){ // t = turn
        t = 1;
        whogoesnow = "Turn: " + p1;
    legit = 2;
    }
    else {
        t = 0;
    whogoesnow = "Turn: " + p2
    legit = 1;
    }
  }
  else {
    t = t;
    legit = -1;
  }
  change = 1  
  return (t);
}

function changing(clicked){
    if(clicked == 1) { spot = empty1 ;}
    if(clicked == 2) { spot = empty2 ;}
    if(clicked == 3) { spot = empty3 ;}
    if(clicked == 4) { spot = empty4 ;}
    if(clicked == 5) { spot = empty5 ;}
    if(clicked == 6) { spot = empty6 ;}
    if(clicked == 7) { spot = empty7 ;}
    if(clicked == 8) { spot = empty8 ;}
    if(clicked == 9) { spot = empty9 ;}
    
    if (spot == -1) {
        if (t == 0) {
            xo = "  O  " ;                      
            spot = 0             
        } else {
            xo = "  X  "  ;              
            spot = 1       
        }                              
        if(clicked == 1) { empty1 = spot;}
        if(clicked == 2) { empty2 = spot;}
        if(clicked == 3) { empty3 = spot;}
        if(clicked == 4) { empty4 = spot;}
        if(clicked == 5) { empty5 = spot;}
        if(clicked == 6) { empty6 = spot;}
        if(clicked == 7) { empty7 = spot;}
        if(clicked == 8) { empty8 = spot;}
        if(clicked == 9) { empty9 = spot;}
    } else {
        if(spot == 0) { xo = "  O  "; }
        if(spot == 1) { xo = "  X  "; }
        change = 0
    }
    return (xo);
}

function change_b1(form){ clicked=1; changing(clicked); t=turnchange(t); form.b1.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b2(form){ clicked=2; changing(clicked); t=turnchange(t); form.b2.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b3(form){ clicked=3; changing(clicked); t=turnchange(t); form.b3.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b4(form){ clicked=4; changing(clicked); t=turnchange(t); form.b4.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b5(form){ clicked=5; changing(clicked); t=turnchange(t); form.b5.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b6(form){ clicked=6; changing(clicked); t=turnchange(t); form.b6.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b7(form){ clicked=7; changing(clicked); t=turnchange(t); form.b7.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b8(form){ clicked=8; changing(clicked); t=turnchange(t); form.b8.value=xo; form.whoseturn.value=whogoesnow; win(); return; }
function change_b9(form){ clicked=9; changing(clicked); t=turnchange(t); form.b9.value=xo; form.whoseturn.value=whogoesnow; win(); return; }

</script>
<script name = "JavaScript">
variables();
</script>

<center>

<div id="players"></div>

<form name="board" id="board">
<input type="button" name="whoseturn" value="Turn: " />
<br /><br />
<table>
<tr>
    <td><input type="button" name="b1" value="      " onClick='change_b1(this.form)'></td>
    <td><input type="button" name="b2" value="      " onClick='change_b2(this.form)'></td>
    <td><input type="button" name="b3" value="      " onClick='change_b3(this.form)'></td>
</tr><tr>
    <td><input type="button" name="b4" value="      " onClick='change_b4(this.form)'></td>
    <td><input type="button" name="b5" value="      " onClick='change_b5(this.form)'></td>
    <td><input type="button" name="b6" value="      " onClick='change_b6(this.form)'></td>
</tr><tr>
    <td><input type="button" name="b7" value="      " onClick='change_b7(this.form)'></td>
    <td><input type="button" name="b8" value="      " onClick='change_b8(this.form)'></td>
    <td><input type="button" name="b9" value="      " onClick='change_b9(this.form)'></td>
</tr>
</table>
</form>

<div class="look" id="status_under"></div>

<div class="look" id="status" style="position:absolute; top:230px; width:100%; height:60px; background-color:black; padding-top:80px;"></div>

</center>
</strong>
</body>
</html>

<?php
}

?> 

