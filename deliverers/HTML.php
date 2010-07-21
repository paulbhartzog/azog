<?php

function html($method, $data){
	$return = NULL;
	
	// get lens for this type
	// use lens to generate html
	

	$return .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' . "\n";
/*
	$return .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">\n';
*/
	$return .= "<html>\n";
	$return .= "<head>\n";
	$return .= "<title>";
	$return .= "Azog";
	$return .= "</title>\n";
	$return .= '<link href="css/main.css" rel="stylesheet" type="text/css" />';
	$return .= "\n";
	$return .= '<link href="javascript/jQuery/jquery.alerts.css" rel="stylesheet" type="text/css" />';
	$return .= "\n";
	$return .= '<script type="text/javascript" src="javascript/jQuery/jquery-1.4.2.js">';
	$return .= "\n";
	$return .= "</script>\n";
	$return .= '<script type="text/javascript" src="javascript/main.js">';
	$return .= "\n";
	$return .= "</script>\n";
	$return .= '<script type="text/javascript" src="javascript/jQuery/jquery.alerts.js">';
	$return .= "\n";
	$return .= "</script>\n";
	$return .= "</head>\n";
	$return .= "<body>\n";

	$lens_name = "thing." . $method . ".html.php";
	$lens = LENSES_DIR . "/" . $lens_name;
	$lens_data = file_get_contents($lens);
	$lens_data1 .= str_replace("<%=title%>", $data['title'], $lens_data);
	$lens_data2 .= str_replace("<%=content%>", $data['body'], $lens_data1);
	$return .= $lens_data2;

/*
//	a possibly drupal way
	$response = $data;
	$return .= include($lens);
*/

	$return .= "(via lens " . $lens_name . ")";
	
	$return .= "\n";
	$return .= "</body>\n";
	$return .= "</html>\n";
	$return .= "\n";

	return $return;
}

?>