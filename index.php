<?php
// HOW AZOG WORKS

// ----------------------------------------------------------------------
// I.  start necessary code
// ----------------------------------------------------------------------

// these includes must always be correct
require_once("environment.php");
require_once("settings.php");
require_once(CORE);

// ----------------------------------------------------------------------
// II.  recognize request
// ----------------------------------------------------------------------

$request_method_callback = recognize_request($_SERVER['REQUEST_METHOD']);



// ----------------------------------------------------------------------
// III.  process request into response
// ----------------------------------------------------------------------

$response = process_request_into_response($request_method_callback);



// ----------------------------------------------------------------------
// IV.  deliver response
// ----------------------------------------------------------------------

deliver_response($response);










//tmp
require_once( SITEROOT . "/shrinking-notes.php");
?>