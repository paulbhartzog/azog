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
				$query = "SELECT title,body FROM revisions INNER JOIN things ON things.current=revisions.id AND things.id ='" . $data . "'";
			}
			else {
				$query = "SELECT title,body FROM revisions INNER JOIN things ON things.current=revisions.id AND things.name='" . $data . "'";
			}
			$db_result = mysql_query($query);
			$response = mysql_fetch_assoc($db_result);
//			$response = "viewing " . $row["body"] . "\n";
			break;
		case "edit":
			if (is_numeric($data)){
				$query = "SELECT name FROM things WHERE things.id ='" . $data . "'";
			}
			else {
				$query = "SELECT name FROM things WHERE things.name ='" . $data . "'";
			}
			$db_result = mysql_query($query);
			$response = mysql_fetch_assoc($db_result);
			break;
		case "delete":
			// change this to INSERT
			if (is_numeric($data)){
				$query = "UPDATE things, revisions SET revisions.status='0' WHERE revisions.id=things.current AND things.id ='" . $data . "'";
			}
			else {
				$query = "UPDATE things, revisions SET revisions.status='0' WHERE revisions.id=things.current AND things.name ='" . $data . "'";
			}
			$db_result = mysql_query($query);
			$response = "marked " . $data . " inactive" . "\n";
			break;
	}
	return $response;
}
?>