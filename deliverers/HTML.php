<?php

function html($data){
	$return = NULL;
	$return .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' . "\n";
/*
	$return .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">\n';
*/
	$return .= "<html>\n";
	$return .= "<head>\n";
	$return .= "<title>";
	$return .= "Azog";
	$return .= "</title>\n";
	$return .= "<!-- css -->\n";
	$return .= "<!-- javascript -->\n";
	$return .= "</head>\n";
	$return .= "<body>\n";

	$return .= str_replace("/azog/", "", $data);

	
	$return .= "\n";
	$return .= "</body>\n";
	$return .= "</html>\n";
	$return .= "\n";

	return $return;
}

?>