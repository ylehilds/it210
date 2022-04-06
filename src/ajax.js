var xmlHttp = GetXmlHttpObject();
var interval;

function xmlhttpPost(strURL, game, winner, id, matchID) {
    xmlHttp = GetXmlHttpObject()
    if (xmlHttp == null) {
        alert ("Browser does not support HTTP Request");
        return;
    }
    xmlHttp.open('GET', strURL, true);
    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            window.location.href = "index.php?winner="+id+"&gameNumber=0"+"&match_id="+matchID;
        } 
    }
    xmlHttp.send(null);
    //xmlHttp.send('w=' + escape(winner) + "&id=" + escape(id) + "&m=" + escape(match) + "&g=" +escape(game));
}

function GetXmlHttpObject() {
    var xmlHttp=null;
    try {
        xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
    } catch (e) {                   // Internet Explorer
        try {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }    
    } return xmlHttp;
}

