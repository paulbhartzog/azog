<?php

// ----------------------------------------------------------------------
// I.  include necessary code
// ----------------------------------------------------------------------

// include recognizers
$recognizers_array = array();
if ($handle = opendir(RECOGNIZERS_DIR)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			include RECOGNIZERS_DIR . "/" . $file;
			array_push($recognizers_array, $file);
        }
    }
    closedir($handle);
}
// include deliverers
$deliverers_array = array();
if ($handle = opendir(DELIVERERS_DIR)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			include DELIVERERS_DIR . "/" . $file;
			$deliverers .= "\t" . $file . "<br/>";
			array_push($deliverers_array, $file);
        }
    }
    closedir($handle);
}

// connect to database
// need to abstract this
$link = db_connect($db_url);
mysql_select_db('azog_dev_1');


// ----------------------------------------------------------------------
// II.  recognize requests
// ----------------------------------------------------------------------

$request_method_callback = NULL;
function recognize_request($server_request_method){
	if (isset($GLOBALS['Request_Types'][$server_request_method])) {
		$request_method_callback = $GLOBALS['Request_Types'][$server_request_method];
		return $request_method_callback;
	}
}

// ----------------------------------------------------------------------
// III.  process requests into responses
// ----------------------------------------------------------------------

require_once("create.php");
require_once("retrieve.php");
require_once("update.php");
require_once("delete.php");

$response = NULL;
function process_request_into_response($request_method_callback, $server_response_method = 'html'){
	$content = NULL;
	if (is_callable($request_method_callback)) {
		$data = NULL;
		$uri_parts = explode('/', $_SERVER['REQUEST_URI']);
		
		// need to NOT hard code this
		// use SITEROOT setting
		if($uri_parts[4] != ""){
			$method = $uri_parts[4];
		}
		else {
			$method = "view";
		}
		if($uri_parts[3] != ""){
			$thing = $uri_parts[3];
		}
		else {
			$thing = "home";
		}
		$content = call_user_func($request_method_callback, $method, $thing);
	}
	if (is_callable($server_response_method)) {
		$response = call_user_func($server_response_method, $method, $content);
	}
	return $response;
}



// ----------------------------------------------------------------------
// IV.  deliver responses
// ----------------------------------------------------------------------

function deliver_response($response){
	if(isset($response)){
//		header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
		header('Content-Type: text/html; charset=utf-8');
		echo $response;
	}
// else?
//		header('Content-Type: text/html; charset=utf-8');
//		header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
}

?>