<?php
/**
* @copyright Makoto Ishihara
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* description: This file is for handling ajax
* Date : 2016/12/21
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
//header("Access-Control-Allow-Headers: X-Requested-With");

// --- support functions ------------------
/*
if (!function_exists('utf8_encode_recurse')) {
    function utf8_encode_recurse($mixed_value)
    {
        if (strtolower(CHARSET) == 'utf-8') {
            return $mixed_value;
        } elseif (!is_array($mixed_value)) {
            return utf8_encode((string)$mixed_value);
        } else {
            $result = array();
            foreach ($mixed_value as $key => $value) {
                $result[$key] = utf8_encode($value);
            }
            return $result;
        }
    }
}
*/
/*
function ajaxAbort($status = 400, $msg = null)
{
    http_response_code($status); // 400 = "Bad Request"
    if ($msg) echo $msg;
    require('includes/application_bottom.php');
    exit();
}
*/
// --- support functions ------------------

// --- AJAX handling ---
if(!isset($_POST('mode'))){
	//ajaxAbort();
}
if($_POST('mode') === "browser_handling"){
	$browserName = $_POST('browser_name');
	$isMobile = $_POST('is_mobile');
	$colorCode = $browserName.$isMobile;
	echo (string)$mixed_value;
}
else{
	//ajaxAbort();
}


// --- AJAX handling ---
