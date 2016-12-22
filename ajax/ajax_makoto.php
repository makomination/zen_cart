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

const MY_SERVER = "127.0.0.1";//yosemiteアップグレード時に変更
const USER_NAME = 'root';
const PASSWORD = 'komazawa';
const DB_NAME = "zencart";


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

echo $sql;