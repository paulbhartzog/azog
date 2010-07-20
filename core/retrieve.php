<?php
function retrieve($method, $data){
	$response = NULL;
	
	switch($method){
		case "add":
			if (is_numeric($data)){
				$type = $data;
			}
			else {
				$type = $data;
			}
			$response = "adding type " . $type . ",  to be done. \n";
			break;
		case "view":
			if (is_numeric($data)){
				$query = "SELECT body FROM revision INNER JOIN thing ON thing.current=revision.id AND thing.id ='" . $data . "'";
			}
			else {
				$query = "SELECT body FROM revision INNER JOIN thing ON thing.current=revision.id AND thing.name='" . $data . "'";
			}
			$db_result = mysql_query($query);
			$row = mysql_fetch_assoc($db_result);
			$response = "viewing " . $row["body"] . "\n";
			break;
		case "edit":
			if (is_numeric($data)){
				$query = "SELECT name FROM thing WHERE thing.id ='" . $data . "'";
			}
			else {
				$query = "SELECT name FROM thing WHERE thing.name ='" . $data . "'";
			}
			$db_result = mysql_query($query);
			$row = mysql_fetch_assoc($db_result);
			$response = "editing " . $row["name"] . "\n";
			break;
		case "delete":
			// change this to INSERT
			if (is_numeric($data)){
				$query = "UPDATE thing, revision SET revision.status='0' WHERE revision.id=thing.current AND thing.id ='" . $data . "'";
			}
			else {
				$query = "UPDATE thing, revision SET revision.status='0' WHERE revision.id=thing.current AND thing.name ='" . $data . "'";
			}
			$db_result = mysql_query($query);
			$response = "marked " . $data . " inactive" . "\n";
			break;
	}
	return $response;
}
?>