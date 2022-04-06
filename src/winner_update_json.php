<?php 

$fname=$_GET['file'];
$id = $_GET['id'];
$match_id = $_GET['match_id'];

$output="";
$file = fopen($fname, "r"); 
while(!feof($file)) {
  $output = $output . fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
$playerData = json_decode($output);

switch ($match_id) {

   case (0):
	$playerData->games[0]->ticTacToe[4]->player1 = $id; // modifies $playerData name for each player based on 
	$playerData->games[0]->ticTacToe[0]->winner = $id; // modifies $playerData name for each player based on 
	//$playerData->players[$number_of_users]->image = 'blank';
	//$playerData->players[$number_of_users]->avatar = 'blank';
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
	break;

   case (1):
	$playerData->games[0]->ticTacToe[4]->player2 = $id; // modifies $playerData name fpr each player based on 
	$playerData->games[0]->ticTacToe[1]->winner = $id;
	//$playerData->players[$number_of_users]->image = 'blank';
	//$playerData->players[$number_of_users]->avatar = 'blank';
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
   break;
   case (2):
	$playerData->games[0]->ticTacToe[5]->player1 = $id; // modifies $playerData name fpr each player based on 
	$playerData->games[0]->ticTacToe[2]->winner = $id;
	//$playerData->players[$number_of_users]->image = 'blank';
	//$playerData->players[$number_of_users]->avatar = 'blank';
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
   break;
   case (3):
	$playerData->games[0]->ticTacToe[5]->player2 = $id; // modifies $playerData name fpr each player based on 
	$playerData->games[0]->ticTacToe[3]->winner = $id;
	//$playerData->players[$number_of_users]->image = 'blank';
	//$playerData->players[$number_of_users]->avatar = 'blank';
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
   break;
   case (4):
	$playerData->games[0]->ticTacToe[6]->player1 = $id; // modifies $playerData name fpr each player based on 
	$playerData->games[0]->ticTacToe[4]->winner = $id;
	//$playerData->players[$number_of_users]->image = 'blank';
	//$playerData->players[$number_of_users]->avatar = 'blank';
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
   break;

   case (5):
	$playerData->games[0]->ticTacToe[6]->player2 = $id; // modifies $playerData name fpr each player based on 
	$playerData->games[0]->ticTacToe[5]->winner = $id;
	//$playerData->players[$number_of_users]->image = 'blank';
	//$playerData->players[$number_of_users]->avatar = 'blank';
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
   break;
   case (6):
	$playerData->games[0]->ticTacToe[6]->winner = $id; // modifies $playerData name fpr each player based on 
	//$playerData->players[$number_of_users]->image = 'blank';
	//$playerData->players[$number_of_users]->avatar = 'blank';
	$playerData2 .= json_encode($playerData);
	$file_to_write=$fname;
	$file = fopen ($file_to_write, "w");
	fwrite($file, $playerData2);
	fclose ($file);
   break;
   default:
	echo "error message on the switch statement!!!";
   }
 header('Location: index.php?winner='.$id.'&gameNumber=0'.'match_id='.$match_id);
?>