<?php 

$fname='data.json';
$gameNumber = $_GET['gameNumber'];
$clear = "*";
$output="";
$file = fopen($fname, "r"); 
while(!feof($file)) {
  $output = $output . fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
$playerData = json_decode($output);

if ($gameNumber == 1)
{
	//$playerData->games[1]->connect4[0]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[0]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[0]->winner = $clear; // modifies $playerData name for each player based on 

	//$playerData->games[1]->connect4[1]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[1]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[1]->winner = $clear; // modifies $playerData name for each player based on 

	//$playerData->games[1]->connect4[2]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[2]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[2]->winner = $clear; // modifies $playerData name for each player based on 
 
	//$playerData->games[1]->connect4[3]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[3]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[3]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData->games[1]->connect4[4]->player1 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[4]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[4]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData->games[1]->connect4[5]->player1 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[5]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[5]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData->games[1]->connect4[6]->player1 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[6]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[1]->connect4[6]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
	
}

if ($gameNumber == 0)
{
	//$playerData->games[1]->connect4[0]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[0]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[0]->winner = $clear; // modifies $playerData name for each player based on 

	//$playerData->games[1]->connect4[1]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[1]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[1]->winner = $clear; // modifies $playerData name for each player based on 

	//$playerData->games[1]->connect4[2]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[2]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[2]->winner = $clear; // modifies $playerData name for each player based on 
 
	//$playerData->games[1]->connect4[3]->player1 = $clear; // modifies $playerData name for each player based on 
	//$playerData->games[1]->connect4[3]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[3]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData->games[0]->ticTacToe[4]->player1 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[4]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[4]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData->games[0]->ticTacToe[5]->player1 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[5]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[5]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData->games[0]->ticTacToe[6]->player1 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[6]->player2 = $clear; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[6]->winner = $clear; // modifies $playerData name for each player based on 
 
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
	
}
?>