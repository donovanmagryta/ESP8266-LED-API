<?php
@$login = urldecode($_GET["login"]);
if ($login == "admin123") {
if(isset($_POST["submit"])){
$lednum = $_POST["lednum"];
$device = $_POST["device"];
//$lednum = ($lednum - 1);
$url = $_POST["url"];
$find = $_POST["find"];
$calcdo = $_POST["matches"];
$pause = $_POST["pause"];
$key = $_POST["key"];
$file = $_SERVER['DOCUMENT_ROOT'] . "/program.json";
$file = fopen("program.json","a+") or die ("file not found");
$json = file_get_contents("program.json");
$data = json_decode($json, true);
$data[$device][$lednum]["url"] = $url;
$data[$device][$lednum]["find"]=$find;
$data[$device][$lednum]["matches"]=$calcdo;
$data[$device][$lednum]["pause"]=$pause;
$newjson = json_encode($data);
file_put_contents("program.json", $newjson);
fclose($file);
echo '<html><style>body { font-size: 300%; }input { font-size: 150%; } button { text-decoration: none; text-align: center; font-size: 100%; margin: 50px; background-color: navy; color: white; border-radius: 12px; } a { text-decoration: none; color: white;} </style> <body> <p> Saved</p><button><a href="http://torchive.000webhostapp.com/led.php?login=admin123">Back</a></button> </body> </html>';
}
else if (!isset($_POST["submit"])) {
echo '<html><style>body { font-size: 300%; }input { font-size: 150%; }</style> <body> <form action="led.php?login=admin123" method="post">
<input type="text" name="device" value="device ID"/><br><input type="text" name="lednum" value="led number"/><br><input-type = "text" name="key" value="api-key"/><br><input type ="text" name="url" value="api url"/><br><input type ="text" name="find" value="search keyword"/><br><input type="text" name="matches" value="must match"/><br><input type="text" name ="pause" value="seconds till next check"/><br><input type="submit" name="submit"/> </form> </body> </html>';
}
}
else {
    echo "invalid login";
}

?>
