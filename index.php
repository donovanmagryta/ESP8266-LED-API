<?php
@$login = urldecode($_GET["login"]);
if ($login == "admin123") {
if(isset($_POST["lednum"])){
$lednum = $_POST["lednum"];
//$lednum = ($lednum - 1);
$url = $_POST["url"];
$find = $_POST["find"];
$calcdo = $_POST["matches"];
$pause = $_POST["pause"];
$file = fopen("program.json","a+") or die ("file not found"); 
$json = file_get_contents('program.json');
$data = json_decode($json, true); 
$data[$lednum][0] = $url;
$data[$lednum][1]=$find;
$data[$lednum][2]=$calcdo;
$data[$lednum][3]=$pause;
$newjson = json_encode($data); 
file_put_contents('program.json', $newjson); 
fclose($file);
echo '<html><style>body { font-size: 300%; }input { font-size: 150%; } button { text-decoration: none; text-align: center; font-size: 100%; margin: 50px; background-color: navy; color: white; border-radius: 12px; } a { text-decoration: none; color: white;} </style> <body> <p> Saved</p><button><a href="http://torchive.000webhostapp.com?login=admin123">Back</a></button> </body> </html>';
}
else if (!isset($_POST["lednum"])) {
echo '<html><style>body { font-size: 300%; }input { font-size: 150%; }</style> <body> <form action="index.php?login=admin123" method="post"> <?php echo $message; ?> <input type="text" name="lednum" value="led number"/><br><input type ="text" name="url" value="api url"/><br><input type ="text" name="find" value="search keyword"/><br><input type="text" name="matches" value="must match"/><br><input type="text" name ="pause" value="seconds till next check"/><br><input type="submit" name="Submit"/> </form> </body> </html>';
}
}
 else if ($login == "device123") {
 $lednum = urldecode($_GET["lednum"]); 
//lednum is question, the rest are parameters.
 $file = fopen("program.json","a+") or die ("file not found"); 
 $json = file_get_contents('program.json');
 $data = json_decode($json, true); 
 $info = $data[$lednum];
$reply = json_encode($info, true);
echo $reply;
fclose($file);
}
else {
echo "invalid login";
}
?> 



