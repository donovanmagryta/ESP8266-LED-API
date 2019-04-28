<?php
if (admin == "password123") {
if(isset($_POST["lednum"])){
$lednum = $_POST["lednum"];
$lednum = ($lednum - 1);
$url = $_POST["url"];
$find = $_POST["find"];
$calcdo = $_POST["matches"];
$file = fopen("program.json","a+") or die ("file not found"); 
$json = file_get_contents('program.json');
$data = json_decode($json, true); 
$data[$lednum][0] = $url;
$data[$lednum][1]=$find;
$data[$lednum][2]=$calcdo;
$data[$lednum][3] = count(data);
$newjson = json_encode($data); 
file_put_contents('program.json', $newjson); 
fclose($file);
$message = ( $lednum . $url . $find . $calcdo) ;
}
else if (!isset($_POST["lednum"])) {
echo '<html> <body> <form action="index.php?admin=password123" method="post"> <?php echo $message; ?> <input type="text" name="lednum" value="led number"/><br><input type ="text" name="url" value="api url"/><br><input type ="text" name="find" value="search keyword"/><br><input type="text" name="matches" value="must match"/><br><input type="submit" name="Submit"/> </form> </body> </html>';
}
}
 else {
 $lednum = urldecode($_GET["lednum"]); //lednum is question, the rest are parameters.
 $file = fopen("program.json","a+") or die ("file not found"); 
 $json = file_get_contents('program.json');
 $data = json_decode($json, true); 
 echo $data[$lednum];
 fclose($file);
}
?>



