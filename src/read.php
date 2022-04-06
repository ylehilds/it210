 <?php
$filename="data.json";// file example 1: read a text file into a string with fgets
$output="";
$file = fopen($filename, "r");
while(!feof($file)) {
  $output = $output . fgets($file, 4096);  //read file line by line into variable
}
fclose ($file);
echo $output;
?>