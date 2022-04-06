<?php
$fname='data.json';
$id = $_GET['id'];
$username = $_GET['username'];
$newName = $_GET['nameToBe'];
$output="";
$file = fopen($fname, "r");
while(!feof($file)) {
  $output = $output . fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
$playerData = json_decode($output);
include("connect.php");
$host = "192.168.200.12";
$connection=mysql_connect($host,$user,$pass) or die ("Unable to connect!");//open connection
mysql_select_db($db) or die ("Unable to select database!");//select database

$name;
$result = mysql_query("SELECT * FROM Users WHERE username='".$username."'");
while($temp = mysql_fetch_array($result))
  {
  $name = $temp['name'];
}



//$picture_database = 'karine';
//$avatar_database = 'kitana'; 
for ($i=0;$i<8;$i++)
{
	if ($playerData->players[$i]->name == $username)
	{
		$playerData->players[$i]->name = $newName;
		$playerData2 .= json_encode($playerData);
		$file_to_write=$fname;
		$file = fopen ($file_to_write, "w");
		fwrite($file, $playerData2);
		fclose ($file);
	}
}
	//$playerData->players[0]->image = "it is workin";
	//$playerData->players[0]->avatar = "lehi";
	//$playerData2 .= json_encode($playerData);
	//$file_to_write=$fname;
	//$file = fopen ($file_to_write, "w");
	//fwrite($file, $playerData2);
	//fclose ($file);
header('Location:http://192.168.100.20:8180/rename.jsp');
?>