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
<script src="populateBracket.js">
</script>
<STYLE TYPE="text/css">
BODY{background-color: white}
IMG {border: 0}
A:visited {color: blue}
FONT.score {color: blue; font-size: large}
FONT.redscore {color: red}
FONT.blackscore {color: black}
</STYLE>
<SCRIPT type="text/javascript" >
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

var player1 = gup("username");
var curentGameNum = gup("curentGameNum");
document.write(player1);
document.write("\n");

document.write(curentGameNum);


</script>
<html>
<body>
 <form enctype="multipart/form-data" action="upload.php" method="POST"> Please choose a file: <input name="uploaded" type="file" /><br /> <input type="submit" value="Upload" /> </form> </body>
</html>


</script>










<?php
}
?>
