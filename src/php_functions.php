<?php
function updateJson($new_user) {
include("connect.php");
$connection=mysql_connect($host,$user,$pass) or die ("Unable to connect!");//open connection
mysql_select_db($db) or die ("Unable to select database!");//select database
$get_users = mysql_query ("SELECT * FROM Users");
$array_of_names = array();
$j=0;
while($row = mysql_fetch_array($get_users))
{ 
    $array_of_names[$j++] = $row['username'] . '<br />';
	//echo "$row['username']";
	//echo"$j";
} 
//for ($i=0;$i<=strlen($array_of_names);$i++)
//{
//	echo "$array_of_names[$i]";
//}
//$i=0;
//while ($i<strlen($array_of_names)){
//echo "$array_of_names[$i]";
//$i++;
//}
//foreach () 

$filename="data.json";// file example 1: read a text file into a string with fgets
$output="";
$file = fopen($filename, "r");
while(!feof($file)) {
  $output = $output . fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
$playerData = json_decode($output);
//json_code($playerData);

//print_r($playerData);
//reading is working fine up to here
$temp;
//for ($i=0; $i<=7;$i++)
$i=0;
while($row = mysql_fetch_array($get_users))
	{
		if ($playerData->players[$i]->name == "*")
		{
			$temp = $playerData->players[$i];
			break;
		}
	$i++;
	echo $i . '"<br />"';
	}
$temp->name = $new_user;
$playerData2 =json_encode($playerData);
$file_to_write="test.json";
$file = fopen ($file_to_write, "w");
fwrite($file, $playerData2);
fclose ($file);
//$m=0;
//foreach($playerData->players->name as $p)
//{
//echo '
//
//Name: '.$p->name.'
//
//';
//$m++;
//}

//mysql_free_result($get_users);
//$playerData->players[0]->{'name'} = 123456789123456;
print_r($playerData);
/*for ($i=0;$i<strlen($playerData);$i++)
	{
		if ($playerData[$i] == 'name')
		{
			$playerData[$i] += $playerData[$i]+'name';
		}
	json_encode($playerData);
	}
print_r($playerData);
}
function json_code ($json) { 

      //remove curly brackets to beware from regex errors

      $json = substr($json, strpos($json,'{')+1, strlen($json));
      $json = substr($json, 0, strrpos($json,'}'));
      $json = preg_replace('/(^|,)([\\s\\t]*)([^:]*) (([\\s\\t]*)):(([\\s\\t]*))/s', '$1"$3"$4:', trim($json));

      return json_decode('{'.$json.'}', true);
 */  } 
?>