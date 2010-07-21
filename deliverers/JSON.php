<?php

function json($data){
	$return = "";
	$return = str_replace("/azog_dev/", "", $data);
	$json_array = array('request' => $return);
	$return =  json_encode($json_array);
	return $return;
}

?>