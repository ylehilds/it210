<?php
$fname='data.json';
$id = $_GET['id'];
$username = $_GET['username'];
$output="";
$file = fopen($fname, "r");
while(!feof($file)) {
  $output = $output . fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
$playerData = json_decode($output);
include("connect.php");
$connection=mysql_connect($host,$user,$pass) or die ("Unable to connect!");//open connection
mysql_select_db($db) or die ("Unable to select database!");//select database
$result = mysql_query("SELECT picture FROM Users WHERE username='".$username."'");
$picture;
$avatar;
while($picture_database = mysql_fetch_array($result))
  {
  $picture = $picture_database['picture'];
}

$result = mysql_query("SELECT avatar FROM Users WHERE username='".$username."'");
$avatar;
while($picture_database = mysql_fetch_array($result))
  {
  $avatar = $picture_database['avatar'];
}
//$picture_database = 'karine';
//$avatar_database = 'kitana';
for ($i=0;$i<8;$i++)
{
	if ($playerData->players[$i]->name == $username)
	{
		$playerData->players[$i]->image = $picture;
		$playerData->players[$i]->avatar = $avatar;
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
header('Location: index.php?gameNumber=1&winner=lehi');
?>