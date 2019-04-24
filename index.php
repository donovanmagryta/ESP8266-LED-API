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
$newjson = json_encode($data); file_put_contents('program.json', $newjson); fclose($file);
$message = ( $lednum . $url . $find . $calcdo) ;
}
else {
echo '<html> <body> <form action="index.php?admin=password123" method="post"> <?php echo $message; ?> <input type="text" name="lednum" value="led number"/><input type ="text" name="url" value="api url"/><input type ="text" name="find" value="search keyword"/><input type="text" name="matches" value="must match"/><input type="submit" name="SubmitButton"/> </form> </body> </html>';
}
}
 else {
 echo $messagejson;
}
?>



