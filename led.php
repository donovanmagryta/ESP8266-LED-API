<?php
@$login = urldecode($_GET["login"]);
if ($login == "admin123") {
if(isset($_POST["submit"])){
$lednum = $_POST["lednum"];
$device = $_POST["device"];
//$lednum = ($lednum - 1);
$url = $_POST["url"];
$find1 = $_POST["find1"];
$finddos = $_POST["find2"];
$find3 = $_POST["find3"];
$find4 = $_POST["find4"];
$calcdo = $_POST["matches"];
$pause = $_POST["pause"];
$file = $_SERVER['DOCUMENT_ROOT'] . "/program.json";
$file = fopen("program.json","a+") or die ("file not found");
$json = file_get_contents("program.json");
$data = json_decode($json, true);
$data[$device][$lednum]["url"] = $url;
$data[$device][$lednum]["find1"]=$find1;
$data[$device][$lednum]["find2"]=$finddos;
$data[$device][$lednum]["find3"]=$find3;
$data[$device][$lednum]["find4"]=$find4;
$data[$device][$lednum]["matches"]=$calcdo;
$data[$device][$lednum]["pause"]=$pause;
$newjson = json_encode($data);
file_put_contents("program.json", $newjson);
fclose($file);
echo '<html><style>body { font-size: 300%; }input { font-size: 150%; } button { text-decoration: none; text-align: center; font-size: 100%; margin: 50px; background-color: navy; color: white; border-radius: 12px; } a { text-decoration: none; color: white;} </style> <body> <p> Saved</p><button><a href="http://ledapiesp.000webhostapp.com/led.php?login=admin123">Back</a></button> </body> </html>';
}
else if (!isset($_POST["submit"])) {
echo '<html><style>body { font-size: 300%; }input { font-size: 150%; }</style> <body> <form action="led.php?login=admin123" method="post">
<input type="text" name="device" value="device ID"/><br><input type="text" name="lednum" value="led number"/><br><input type ="text" name="url" value="api url"/><br><input type ="text" name="find1" value="indice 1"/><br><input type ="text" name="find2" value="indice 2"/><br><input type ="text" name="find3" value="indice 3"/><br><input type ="text" name="find4" value="indice 4"/><br><input type="text" name="matches" value="must match"/><br><input type="text" name ="pause" value="seconds till next check"/><br><input type="submit" name="submit"/> </form> </body> </html>';
}
}
else {
    echo "invalid login";
}

?>
