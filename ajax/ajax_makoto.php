<?php
/*
Author: Makoto Ishihara
Date: 2016 12/21
Description: Ajax handler for my_own_template/jscript/makoto.js. Return color code according to browser.
*/

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

echo "$browserName.$isMobile";