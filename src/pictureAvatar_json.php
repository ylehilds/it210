<?php 
include("connect.php");
include ("php_functions.php");
$fname='data.json';
$id = $_GET['id'];

echo $id."test";
$output="";
$file = fopen($fname, "r"); 
while(!feof($file)) {
  $output = $output.fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
$playerData = json_decode($output);
$test ='test';
$playerData->players[2]->image = $test;
$playerData->players[2]->avatar = $test;
$playerData2 .= json_encode($playerData);
$file_to_write=$fname;
$file = fopen ($file_to_write, "w");
fwrite($file, $playerData2);
fclose ($file);
//header('Location: index.php');
?>
