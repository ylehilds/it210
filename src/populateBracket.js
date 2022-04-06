 var gup = function( name ) {
   
      var results = (new RegExp("[\\?&]"+name+"=([^&#]*)")).exec(window.location.href);
   
      if ( results == null ) {return ""}
   
      else {return results[1]}
   
      }
// Store the name of the selected game
var currentGame;
 
// Store the array number of game selected  (2 Games, it should be 0 or 1)
var currentGameNum;

// Object that will store values from JSON file
var bracketData;
var bracketDataLoggedIns="";
var array = new Array();
//var bracketDataLoggedIns.username="";
//var bracketDataLoggedIns.username.name="";
var iis = "http://192.168.100.33";
var nameLoggedIn = readCookie("username");
function checkIfThereIsaWinner()
{
var winner = gup("winner");
var gameNumber = gup("gameNumber");
if (winner)
{
	if ( gameNumber == 1)
	{
		toggleDiv(0);
	}
	else
	{
		toggleDiv(1);
	}
}
}

function refresh() {
var rand = Math.random() * 1000; 
this.window.location = 'index.php?'+'winner='+winner+'&gameNumber='+gameNumber+'&match_id='+match_id+'&rand='+rand;
//checkIfThereIsaWinner();loadJSON();buttonHide();
}


/*

if (Plyer[cookie])
{
show button diacivated
}
var bracketLength = bracketData.games[1].connect4.length;
var player = bracketData.players[temp].name;
for (int i=0;i<bracketLength;i++)
	{
		if (Player[cookie] && logged_in)
	}
*/



function buttonHide() {
//loadJSON();
var j;
var m;
var p1;
var p2;
var gameNumber = gup("gameNumber");
if (gameNumber==1 || currentGameNum ==1)
{
for (var i=0;i<8;i++)
{
	var temp = bracketData.games[1].connect4[i].player1;
	var temp2 = bracketData.games[1].connect4[i].player2;
	var name_temp = bracketData.players[i].name;
if (temp !="*" && temp2!="*")
	{
	var winner = bracketData.games[1].connect4[i].winner;
		if (winner =="*")
		{
			var input = "input"+(i+1);
			document.getElementById(input).style.display = 'inline';
		}
	}
if (name_temp=="")
	{
			var input = "input"+(i+1);
			document.getElementById(input).style.display = 'none';
	}
}
}
else {
if(bracketData)
{

for (var i=0;i<7;i++)
{
	var temp = bracketData.games[0].ticTacToe[i].player1;
	var temp2 = bracketData.games[0].ticTacToe[i].player2;
	var name_temp = bracketData.players[i].name;

j = bracketData.games[0].ticTacToe[i].player1;
m = bracketData.games[0].ticTacToe[i].player2;


			//var j = bracketData.games[game].connect4[i].player1;
			for (var x =0;x<8;x++)
				{

					if (j == x)
					{
						p1 = bracketData.players[j].name;
					}
					
				}
			//var m = bracketData.games[game].connect4[i].player2;
				for (var x =0;x<8;x++)
				{
					if (m == x)
					{
						p2 = bracketData.players[m].name;
					}
	
					}


if (p1 == readCookie("username") || p2 == readCookie("username"))
{	
if (temp !="*" && temp2!="*")
	{
	var winner = bracketData.games[0].ticTacToe[i].winner;
		if (winner =="*")
		{
			
				var input = "input"+(i+1);
				document.getElementById(input).style.display = 'inline';
				document.getElementById(input).disabled = true;
				enableOrDisableButton(p1,p2,input);
			
		}
	}
}
	





}
}
/*
for (var i=0;i<8;i++)
{
	var temp = bracketData.games[0].ticTacToe[i].player1;
	var temp2 = bracketData.games[0].ticTacToe[i].player2;
if (temp !="*" && temp2!="*")
{
var winner = bracketData.games[0].ticTacToe[i].winner;
	if (winner =="*")
	{
		var input = "input"+(i+1);
		document.getElementById(input).style.display = 'inline';
	}
}
}
*/
}
}

function enableOrDisableButton(p1,p2,input)
{
//$.getJSON("loggedIn.php", function(json){
 //  bracketDataLoggedIns = eval(json); });
//loadLoggedIns();
//updateLoggedIns();
if (array.length)
{
for (var i=0;i<array.length;i++)
	{
		if (p1 == array[i])
			{
				for (var i=0;i<array.length;i++)
				{
					if (p2 == array[i])
					{
						document.getElementById(input).disabled = false;
					}
				}
			}
		else if (p2 == array[i])
			{
				for (var i=0;i<array.length;i++)
				{
					if (p1 == array[i])
					{
						
						document.getElementById(input).disabled = false;
					}
				}
			}
	}
}
}
 

function getCurrentGame() {
var test =  currentGame;
return test;
}
function getcurrentGameNum() {
return currentGameNum;
}
function toggleDiv(id){
//id = gup("gameImOn");
      if(id==0)
      {
	document.getElementById('choose_game_text').style.display = 'none';
	document.getElementById('loggedInPlayersText').style.display = 'inline';
	document.getElementById('logged').style.display = 'inline';
	document.getElementById('userName').style.display = 'inline';
	document.getElementById('connect4_banner').style.display = 'inline';
	document.getElementById('layer1').style.display = 'none';
        document.getElementById('layer2').style.display = 'block';
	loadJSON();
	
	}
      else 
      {
	document.getElementById('choose_game_text').style.display = 'none';
	document.getElementById('userName').style.display = 'inline';
	document.getElementById('loggedInPlayersText').style.display = 'inline';
	document.getElementById('logged').style.display = 'inline';
	document.getElementById('tic-tac-toe_banner').style.display = 'inline';
        document.getElementById('layer1').style.display = 'none';
	document.getElementById('layer2').style.display = 'block';
	loadJSON();
      }
}

/**
*	loadJSON() 
*
*	Load the JSON file via AJAX and create bracketData object.
*/
var jsonfile;
function loadJSON()
{
	var rand = Math.random() * 1000; 
	// Create AJAX objet and check if it was created
	var jsonAjax = GetXmlHttpObject();
	if (jsonAjax == null) { alert('Your browser is uber lame.  It does not support AJAX.  Upgrade NOW.'); return; }
	
	// Get JSON file. Set bracketData to objects defined by your json.
	// To learn more about AJAX, go to W3Schools and read the AJAX Turotial.
	var url = 'data.json?'+ rand;// EDIT THIS
	jsonfile = url;
	jsonAjax.onreadystatechange = function() {
		if (jsonAjax.readyState==4)
		{
			// Turn your JSON into a JavaScript object.
			// "("'s are put around it to make it safer.  
			// In real world it is wise to use a JavaScript library to execuse JSON although this should be ok.
			bracketData = eval("(" + jsonAjax.responseText + ")" );
			
			// Call function to populate matches after bracketData object created
			populateMatches();
		}
	}
	jsonAjax.open("GET", url, true);
	jsonAjax.send(null);
}

function setCurrentGame(id)
	{
	if (id == 1)
		{
			currentGame = 'connect4';
			currentGameNum = 1;
		}
	else 
	{
	currentGame = 'ticTacToe';
	currentGameNum = 0;
	}
}

function functionGoesThroughJsonFile(id, match_id)
{ 
var match_id = match_id;
var gameNumber = gup("gameNumber");
//var temp = bracketData.games[0].ticTacToe[0].player1
var oneID =null;
var twoID =null;
var oneName =null;
var twoName = null;
var i = id;
var game;	
var j;
var m;
if (currentGameNum == 1 || gameNumber==1)
{
j = bracketData.games[1].connect4[i].player1;
m = bracketData.games[1].connect4[i].player2;
}
else {
j = bracketData.games[0].ticTacToe[i].player1;
m = bracketData.games[0].ticTacToe[i].player2;
}
			//var j = bracketData.games[game].connect4[i].player1;
			for (var x =0;x<8;x++)
				{

					if (j == x)
					{
						oneID = bracketData.players[j].id;
						oneName = bracketData.players[j].name;
					}
					
				}
			//var m = bracketData.games[game].connect4[i].player2;
				for (var x =0;x<8;x++)
				{
					if (m == x)
					{
						twoID = bracketData.players[m].id;
						twoName = bracketData.players[m].name;
					}
	
					}
if (currentGameNum ==1)
this.window.location = 'connect-4.php?'+'player1ID='+oneID+'&player2ID='+twoID+'&match_id='+match_id+'&player1Name='+oneName+'&player2Name='+twoName;
if (currentGameNum ==0)
 this.window.location = 'tictactoe.php?'+'player1ID='+oneID+'&player2ID='+twoID+'&match_id='+match_id+'&player1Name='+oneName+'&player2Name='+twoName;

if (gameNumber) 
{ if (gameNumber==1)
	{
		this.window.location = 'connect-4.php?'+'player1ID='+oneID+'&player2ID='+twoID+'&match_id='+match_id+'&player1Name='+oneName+'&player2Name='+twoName;
	}
  else this.window.location = 'tictactoe.php?'+'player1ID='+oneID+'&player2ID='+twoID+'&match_id='+match_id+'&player1Name='+oneName+'&player2Name='+twoName;
}

}

/**
*	populateMatches()
*
*	Go through the matches.  Populate the bracket with information stored in JSON.
*/
function populateMatches() // !!!!!     FIX the currentGameNum == 1 condition because it is not working properly evne though i'm playing connect4 after first play then it goes to else statement.  !!!!!
{
var jumpTwo =2;
var j = 0;
var player1;
var player2;
var gameNumber = gup("gameNumber");
var myArrayNames = ['slot_0_Name', 'slot_1_Name', 'slot_2_Name', 'slot_3_Name', 'slot_4_Name', 'slot_5_Name', 'slot_6_Name', 'slot_7_Name', 'slot_8_Name', 'slot_9_Name', 'slot_10_Name', 'slot_11_Name', 'slot_12_Name', 'slot_13_Name', 'slot_14_Name', 'slot_15_Name']
var myArrayPics = ['slot_0_Picture','slot_1_Picture','slot_2_Picture','slot_3_Picture','slot_4_Picture','slot_5_Picture','slot_6_Picture','slot_7_Picture','slot_8_Picture','slot_9_Picture','slot_10_Picture','slot_11_Picture','slot_12_Picture','slot_13_Picture','slot_14_Picture', 'slot_15_Picture']
var myArrayMouse = ['mouse0', 'mouse1', 'mouse2', 'mouse3', 'mouse4', 'mouse5', 'mouse6','mouse7', 'mouse8', 'mouse9', 'mouse10', 'mouse11', 'mouse12', 'mouse13', 'mouse14']
if (currentGameNum == 1 || gameNumber==1)
{
var test = bracketData.games[1].connect4.length;
	//loadJSON();
	for (var i=0;i<test; i++)
	{
		var temp = bracketData.games[1].connect4[j].player1;
		var temp2 = bracketData.games[1].connect4[j].player2;
		var playerImage;
		var playerImageAvatar;
		var playerImageTwo;
		var playerImageAvatarTwo

		var championName = bracketData.games[1].connect4[6].winner;

		if (temp!="*")
		{
		playerImage = bracketData.players[temp].image;
		playerImageAvatar = bracketData.players[temp].avatar;
		document.getElementById(myArrayNames[(i*2)]).innerHTML = bracketData.players[temp].name;
		//document.getElementById(myArrayPics[i]).src = bracketData.players[temp].image;
		document.getElementById(myArrayPics[(i*2)]).innerHTML = "<img src='"+iis+"/Images/"+playerImage+"' onMouseOver=\"this.src='"+iis+"/Images/"+playerImageAvatar+"'\" onMouseOut=\"this.src='"+iis+"/Images/"+playerImage+"'\" height='55px' width='75px'/>";

//document.getElementById(myArrayPics[(i*2)]).innerHTML = "<img src='"+playerImage+"' onMouseOver=src='"+playerImageAvatar+"' onMouseOut=src='"+playerImage+"' height='55px' width='75px'/>";
		}
		if (temp2!="*")
		{
		playerImageTwo = bracketData.players[temp2].image;
		playerImageAvatarTwo = bracketData.players[temp2].avatar;
		document.getElementById(myArrayNames[i*2+1]).innerHTML = bracketData.players[temp2].name;
		//document.getElementById(myArrayPics[i+1]).src = bracketData.players[temp2].image;
		document.getElementById(myArrayPics[(i*2+1)]).innerHTML = "<img src='"+iis+"/Images/"+playerImageTwo+"' onMouseOver=\"this.src='"+iis+"/Images/"+playerImageAvatarTwo+"'\" onMouseOut=\"this.src='"+iis+"/Images/"+playerImageTwo+"'\" height='55px' width='75px'/>";

//document.getElementById(myArrayPics[(i*2+1)]).innerHTML = "<img src='"+playerImageTwo+"' onMouseOver=src='"+playerImageAvatarTwo+"' onMouseOut=src='"+playerImageTwo+"' height='55px' width='75px' />";
		}
		j++;

	if (i==6)
	{
		if (championName != "*")
		{
			playerImageTwo = bracketData.players[championName].image;
			playerImageAvatarTwo = bracketData.players[championName].avatar;
			document.getElementById(myArrayNames[i*2+2]).innerHTML = bracketData.players[championName].name;
			//document.getElementById(myArrayPics[i+1]).src = bracketData.players[temp2].image;
			document.getElementById(myArrayPics[(i*2+2)]).innerHTML = "<img src='"+iis+"/Images/"+playerImageTwo+"' onMouseOver=\"this.src='"+iis+"/Images/"+playerImageAvatarTwo+"'\" onMouseOut=\"this.src='"+iis+"/Images/"+playerImageTwo+"'\" height='55px' width='75px'/>";
//document.getElementById(myArrayPics[(i*2+2)]).innerHTML = "<img src='"+playerImageTwo+"' onMouseOver=src='"+playerImageAvatarTwo+"' onMouseOut=src='"+playerImageTwo+"' height='55px' width='75px' />";
			xml_logFile();
		}
	}
	}
buttonHide();
}
else
{
var test = bracketData.games[0].ticTacToe.length;
	for (var i=0;i<test; i++)
	{
	//alert(i);
		//bracketData.games[1].connect4.length
		var temp = bracketData.games[0].ticTacToe[j].player1;
		var temp2 = bracketData.games[0].ticTacToe[j].player2;

		var playerImage;
		var playerImageAvatar;
	
		var playerImageTwo;
		var playerImageAvatarTwo;

		var championName = bracketData.games[0].ticTacToe[6].winner;
	if (temp!="*")
		{
		playerImage = bracketData.players[temp].image;
		playerImageAvatar = bracketData.players[temp].avatar;
		document.getElementById(myArrayNames[(i*2)]).innerHTML = bracketData.players[temp].name;
		//document.getElementById(myArrayPics[i]).src = bracketData.players[temp].image;
		document.getElementById(myArrayPics[(i*2)]).innerHTML = "<img src='"+playerImage+"' onMouseOver=src='"+playerImageAvatar+"' onMouseOut=src='"+playerImage+"' height='55px' width='75px'/>";
		}
	if (temp2!="*")
		{
		playerImageTwo = bracketData.players[temp2].image;
		playerImageAvatarTwo = bracketData.players[temp2].avatar;
		document.getElementById(myArrayNames[i*2+1]).innerHTML = bracketData.players[temp2].name;
		//document.getElementById(myArrayPics[i+1]).src = bracketData.players[temp2].image;
		document.getElementById(myArrayPics[(i*2+1)]).innerHTML = "<img src='"+playerImageTwo+"' onMouseOver=src='"+playerImageAvatarTwo+"' onMouseOut=src='"+playerImageTwo+"' height='55px' width='75px' />";
		}
		j++;

	if (i==6)
	{
		if (championName != "*")
		{
		playerImageTwo = bracketData.players[championName].image;
		playerImageAvatarTwo = bracketData.players[championName].avatar;
		document.getElementById(myArrayNames[i*2+2]).innerHTML = bracketData.players[championName].name;
		//document.getElementById(myArrayPics[i+1]).src = bracketData.players[temp2].image;
		document.getElementById(myArrayPics[(i*2+2)]).innerHTML = "<img src='"+playerImageTwo+"' onMouseOver=src='"+playerImageAvatarTwo+"' onMouseOut=src='"+playerImageTwo+"' height='55px' width='75px' />";
		xml_logFile();
		}
	}
	}
buttonHide();
}
}

/**
*	GetXmlHttpObject()
*
*	This creates an AJAX object for IE or everything else.
*	Code taken from http://w3schools.com/ajax/ajax_example_suggest.asp
*/

function creatediv(id, html, width, height, left, top) {
var newdiv = document.createElement('div');
   newdiv.setAttribute('id', id);
   
   if (width) {
       newdiv.style.width = width;
   }
   
   if (height) {
       newdiv.style.height = height;
   }
   
   if ((left || top) || (left && top)) {
       newdiv.style.position = "absolute";
       
       if (left) {
           newdiv.style.left = left;
       }
       
       if (top) {
           newdiv.style.top = top;
       }
   }
   newdiv.style.fontFamily = 'Comic Sans MS';
   newdiv.style.fontSize = 22;	
  // newdiv.style.background = "#00C"; 
   //newdiv.style.border = "4px solid #000";
   
   if (html) {
       newdiv.innerHTML = html;
   } else {
       newdiv.innerHTML = "nothing";
   }
   
   document.body.appendChild(newdiv);

}


var obj;
function ProcessXML(url) {
// native object
if (window.XMLHttpRequest) {
	// obtain new object
	obj = new XMLHttpRequest();
	// set the callback function 
	obj.onreadystatechange = processChange;
	// we will do a GET with the url; "true" for asynch
	obj.open("GET", url, true);
	// null for GET with native object
	obj.send(null);
	// IE/Windows ActiveX object
} 
else if (window.ActiveXObject) {
	obj = new ActiveXObject("Microsoft.XMLHTTP");
	if (obj) {
	obj.onreadystatechange = processChange;
	obj.open("GET", url, true);
	// don't send null for ActiveX
	obj.send();
	}
} 
else { alert("Your browser does not support AJAX"); }
}

var ajax;
function Ajax(id, match_id)
{
	// Create AJAX objet and check if it was created
	ajax = GetXmlHttpObject();
	if (ajax == null) { alert('Your browser is uber lame.  It does not support AJAX.  Upgrade NOW.'); return; }
	var data ='?id=' + id + '&match_id=' + match_id + '&file=data.json';
	var url = "winner_update_json.php";	// EDIT THIS
	
	ajax.onreadystatechange = HandleResponse;
	ajax.open("GET", url+data, true);
	ajax.send(null);

//	ajax.open("POST", url, true);
//	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
//	ajax.setRequestHeader("Content-length", data.length);
//	ajax.setRequestHeader("Connection", "close");
//	ajax.onreadystatechange = HandleResponse;
//	ajax.send(data);

	//ajax.open("POST", url, true);
	//ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//ajax.send(data);
	
	
}

function HandleResponse()
{
if (ajax.readyState==4 && ajax.status == 200) //&& ajax.status == 200
		{
			goToPopulateBracketToseeCurrentGame()
		}
//else alert("There was a problem in the returned data:\n");
	
}

/*

function processChange() {
// 4 means the response has been returned and ready to be processed
if (obj.readyState == 4)
{// 200 means "OK"
	if (obj.status == 200) 
	{// process whatever has been sent back here // anything else means a problem
	}
	else
	{
		alert("There was a problem in the returned data:\n");
	}
}
}


function HandleResponse(response, id, match_id)
{
  document.getElementById('ResponseDiv').innerHTML = response;

} 
function MakeRequest()
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleResponse(xmlHttp.responseText); // function to handle response
    }
  }

  xmlHttp.open("GET", "ajax.php", true); 
  xmlHttp.send(null);
}
*/
function createButton(winner, match_id) {
var buttonnode= document.createElement('input');
buttonnode.setAttribute('type','button');
buttonnode.setAttribute('name','button');
buttonnode.setAttribute('value','Update Bracket');
buttonnode.onclick = function () {Ajax(winner, match_id);}
buttonnode.style.left = 369;
buttonnode.style.top = 445;
buttonnode.style.position = "absolute";
document.body.appendChild(buttonnode);
}
function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject)
	{
		// code for IE6, IE5
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}

var json_ajax_xml;
function xml_logFile() {

	json_ajax_xml = GetXmlHttpObject();
	if (json_ajax_xml == null) { alert('Your browser is uber lame.  It does not support AJAX.  Upgrade NOW.'); return; }
	var url = "/cgi-bin/logit.pl";
	
	json_ajax_xml.onreadystatechange = HandleResponseXml;
	json_ajax_xml.open("GET", url, true);
	json_ajax_xml.send(null);
}

function HandleResponseXml()
{
if (json_ajax_xml.readyState==4 && json_ajax_xml.status == 200)
		{
			clearJson();
			//goToPopulateBracketToseeCurrentGame();
		}	
}


var playerWinnerClear;
function clearJson() {	
var gameNumber = gup("gameNumber");
	playerWinnerClear = GetXmlHttpObject();
	if (playerWinnerClear == null) { alert('Your browser is uber lame.  It does not support AJAX.  Upgrade NOW.'); return; }
	var data = '?gameNumber=' + gameNumber;
	var url = "clearJson.php";
	
	playerWinnerClear.onreadystatechange = HandleResponsePhp;
	playerWinnerClear.open("GET", url+data, true);
	playerWinnerClear.send(null);
}

function HandleResponsePhp()
{
if (playerWinnerClear.readyState==4 && playerWinnerClear.status == 200)
		{
			goToPopulateBracketToseeCurrentGame()
		}	
}

function updateLoggedIns(){ 
   // Assuming we have #shoutbox
 $('#logged').html('');
$.getJSON("loggedIn.php", function(json){
   bracketDataLoggedIns = eval(json);
if (bracketDataLoggedIns.username.name.length)
{
for(var i=0;i<bracketDataLoggedIns.username.name.length;i++)
{
	//$('#logged').append('<p>');
	$('#logged').append(bracketDataLoggedIns.username.name[i]);
	$('#logged').append('<br />');
	array[i] =  bracketDataLoggedIns.username.name[i];
}
}
 });
buttonHide();
}

function loadLoggedIns(){

return $.getJSON("loggedIn.php", function(json){
   bracketDataLoggedIns = eval([json]);


//eval(json);
 });
}

function readCookie(name)
{
var nameEQ = name + "=";
var ca = document.cookie.split(';');
for(var i=0;i < ca.length;i++) {
var c = ca[i];
while (c.charAt(0)==' ') c = c.substring(1,c.length);
if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
}
return null;
}
