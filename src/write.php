 <?php
$output="hungry but too lazy to cook.";// php file example : write string variable to text file
$newfile="newfile.json";
$file = fopen ($newfile, "w");
fwrite($file, $output);
fclose ($file); 
?> 