<?php
/*
Author: Makoto Ishihara
Date: 2016 12/21
Description: Ajax handler for my_own_template/jscript/makoto.js. Return color code according to browser.
*/

//can not access $db from here
//define('IS_ADMIN_FLAG', true);
//require_once('../includes/classes/db/mysql/query_factory.php');
//$db = new queryFactory();

define(MY_SERVER, "127.0.0.1");//yosemiteアップグレード時に変更
define(USER_NAME,'root');
define(PASSWORD, 'komazawa');
define(DB_NAME, "zencart");


$browserName = $_POST['browser_name'];
$isMobile = $_POST['is_mobile'];

//posted value check
$browserNames = ['chrome', 'safari', 'opera', 'ie', 'firefox'];
$isMobiles = ['false', 'true'];
$errorFlag = true;
for($i=0; $i < count($browserNames); $i++){
	if($browserName === $browserNames[$i]){
		for($j=0; $j < count($isMobiles); $j++){
			$errorFlag = true;
			if($isMobile === $isMobiles[$j]){
				$errorFlag = false;
				break 2;
			}
		}
	}
}
if($errorFlag){
	http_response_code(400);
	echo 'post value error';
	exit();
}

$sql = "SELECT color_code FROM browser_color WHERE browser_name='" .$browserName. "' AND is_mobile='" .$isMobile. "';";

//$colorCode =
//_createMysqli();
$mysqli = new mysqli(MY_SERVER, USER_NAME, PASSWORD, DB_NAME);
if( $mysqli->connect_errno ) {
	echo '<script type="text/javascript">alert("No DB there")</script>';
	exit;
}
$mysqli->set_charset("utf8");
$resultArray = array();
$result = $mysqli->query($sql);
//var_dump($result);
if($result->num_rows === 1){
	$colorCode = $result->fetch_assoc()["color_code"];
	//var_dump($colorCode);
	echo $colorCode;
}else{
	echo 'error happend';
}

/*
if ($result = $mysqli->query($sql)) {
	//echo 'SELECT SUCCESS';
	while ($record = $result->fetch_assoc()) {
		array_push($resultArray, $record[0][color_code];
	}
	$mysqli->close();
}else {
	$resultArray = null;
}
*/

//echo $sql;